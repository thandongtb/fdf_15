<?php
namespace App\Repositories\Comment;

use Auth;
use App\Models\Comment;
use App\Repositories\BaseRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use Cart;
use DB;
use Carbon\Carbon;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }
}
