<?php
namespace App\Repositories\Suggest;

use Auth;
use App\Models\Suggestion;
use App\Repositories\BaseRepository;
use App\Repositories\Suggest\SuggestRepositoryInterface;

class SuggestRepository extends BaseRepository implements SuggestRepositoryInterface
{
    public function __construct(Suggestion $suggest)
    {
        $this->model = $suggest;
    }

    public function all()
    {
        $suggests = $this->model
            ->paginate(config('paginate.suggest.normal'));

        return $suggests;
    }

    public function getAllSuggests()
    {
        return $this->model->with('category', 'user')
            ->paginate(config('paginate.product.normal'));
    }
}
