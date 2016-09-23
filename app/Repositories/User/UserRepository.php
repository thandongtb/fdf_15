<?php

namespace App\Repositories\User;

use Auth;
use App\Models\User;
use App\Repositories\BaseRepository;
Use App\Repositories\User\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
