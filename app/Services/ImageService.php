<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Social\SocialRepositoryInterface;
use Cloudder;

class ImageService
{
    public function uploadCloud($file, $name) {
        Cloudder::upload($file, config('common.path_cloud_product') . $name);

        return Cloudder::getResult()['url'];
    }
}
