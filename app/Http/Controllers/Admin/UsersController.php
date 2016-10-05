<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\ImageService;

class UsersController extends Controller
{
    protected $userRepository;
    protected $imageService;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ImageService $imageService
    )
    {
        $this->userRepository = $userRepository;
        $this->imageService = $imageService;
    }

    public function index()
    {
        $users = $this->userRepository->paginate(config('paginate.user.normal'));

        return view('admin.user.index', compact('users'));
    }


    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            return redirect()->action('Admin\UsersController@index')
                ->withErrors(trans('user.user_not_found'));
        }

        return view('admin.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            return redirect()->route('user.index')
                ->withErrors(trans('user.user_not_found'));
        }

        return view('admin.user.edit', compact('user'));
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
                return redirect()->action('Admin\UsersController@index')
                    ->withSuccess(trans('user.update_user_successfully'));
            }
        }

        return redirect()->action('Admin\UsersController@index')
            ->withErrors(trans('user.update_user_fail'));
    }

    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (!$user) {
            return redirect()->action('Admin\UsersController@index')
                ->withErrors(trans('user.user_not_found'));
        }

        if ($user->delete()) {
            return redirect()->action('Admin\UsersController@index')
                ->withSuccess(trans('user.delete_user_successfully'));
        }

        return redirect()->action('Admin\UsersController@index')
            ->withErrors(trans('user.delete_user_fail'));
    }
}
