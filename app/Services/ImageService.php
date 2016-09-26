<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Social\SocialRepositoryInterface;
use Cloudder;

class ImageService
{
    public function uploadCloud($file, $path, $name) {
        Cloudder::upload($file, $path . $name);

        return Cloudder::getResult()['url'];
    }
}
