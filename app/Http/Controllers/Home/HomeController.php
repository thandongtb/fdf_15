<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $data = $this->userRepository->all();

        return $data;
    }
}
