<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
Use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\UpdateUserRequest;
use Validator;
use Hash;
use App\Services\ImageService;
use Cart;

class UsersController extends Controller
{
    protected $userRepository;
    protected $imageService;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ImageService $imageService
    ) {
        $this->userRepository = $userRepository;
        $this->imageService = $imageService;
        $this->middleware('auth');
    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);
        $subTotal = Cart::subtotal();
        $totalCartItems = Cart::count();

        if ($user) {
            return view('home.user-profile',
                compact('user', 'totalCartItems', 'subTotal'));
        }

        return view('home.user-profile')->withErrors(trans('homepage.message.find_user_fail'));
    }

    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        $subTotal = Cart::subtotal();
        $totalCartItems = Cart::count();

        if ($user) {
            if ($user->isCurrent()) {
                return view('home.user-update',
                    compact('user', 'totalCartItems', 'subTotal'));
            }

            return redirect()->action('Home\HomeController@index')
                ->withErrors(trans('homepage.permission_denied'));
        }

        return view('home.user-profile')
            ->withErrors(trans('homepage.message.find_user_fail'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userRepository->find($id);

        if ($user) {
            if ($request->hasFile('avatar')) {
                $data = $request->only('name', 'email', 'avatar', 'address', 'phone');
            } else {
                $data = $request->only('name', 'email', 'address', 'phone');
            }

            if ($user->email == $data['email'] || is_null($data['email'])) {
                unset($data['email']);
            }

            $configPath = config('common.user.path');

            if (isset($data['avatar'])) {
                $file = $request->avatar;
                $data['avatar']= $this->imageService->uploadCloud($file,
                    config('common.path_cloud_avatar'), $request->name);
            }

            $result = $this->userRepository->update($data, $id);

            if ($result) {
                return redirect()->action('Home\UsersController@show', ['id' => $id])
                    ->withSuccess(trans('homepage.message.update_user_success'));
            }
        }
    }
}
