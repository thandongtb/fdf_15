<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Social\SocialRepositoryInterface;
use Illuminate\Http\Request;
use Socialite;
use Auth;

class UserService
{
    private $userRepository;
    private $socialRepository;

    protected $redirectTo = '/home';

    public function __construct(
        UserRepositoryInterface $userRepository,
        SocialRepositoryInterface $socialRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->socialRepository = $socialRepository;
    }

    public function handleProvider($driver) {
        $userSocial = Socialite::driver($driver)->user();
        $user = $this->userRepository->findSocialEmail($userSocial);

        if ($user) {
            return $user;
        }
        $user = $this->userRepository->create([
            'email' =>  $userSocial->email,
            'name' => $userSocial->name,
        ]);

        $temp = $this->socialRepository->create([
            'user_id' => $user->id,
            'provider_user_id' => $userSocial->id,
            'provider' => $driver
        ]);

        return $user;
    }

    public function handleProviderCallback($driver)
    {
        switch ($driver) {
            case 'twitter':
                $userSocial = Socialite::driver('twitter')->user();
                $user = $this->userRepository->findSocialEmail($userSocial);

                if ($user) {
                    Auth::login($user);

                    return redirect()->to($this->redirectTo);
                }
                $user = $this->userRepository->create([
                    'email' =>  $userSocial->email ? $userSocial->email : $userSocial->nickname,
                    'name' => $userSocial->name,
                ]);

                $temp = $this->socialRepository->create([
                    'user_id' => $user->id,
                    'provider_user_id' => $userSocial->id,
                    'provider' => $driver
                ]);
                Auth::login($user);

                return redirect()->to($this->redirectTo);

            default:
                $user = $this->handleProvider($driver);
                Auth::login($user);

                return redirect()->to($this->redirectTo);

        }
    }

    public function create(array $data)
    {
        return $this->userRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'username' => 'required|min:8|unique:users',
        ]);
    }

    public function login(Request $request)
    {
        $typeLogin  = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credential = [
            $typeLogin => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credential)) {
            return redirect()->intended($this->redirectTo);
        }

        return redirect()->back()->withErrors([trans('auth.invalid_info')])->withInput($request->all());
    }

    public function register(Request $request) {
        $validate = $this->validator($request->all());

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput($request->all());
        }

        $user = UserService::create($request->all());
        Auth::login($user);

        return redirect()->to($this->redirectTo);
    }
}
