<?php

namespace App\Repositories\Social;

use Auth;
use App\Models\Social;
use App\Repositories\BaseRepository;
Use App\Repositories\Social\SocialRepositoryInterface;

class SocialRepository extends BaseRepository implements SocialRepositoryInterface
{
    public function __construct(Social $social)
    {
        $this->model = $social;
    }
}
