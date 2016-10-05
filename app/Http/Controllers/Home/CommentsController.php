<?php

namespace App\Http\Controllers\Home;

use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Controllers\Controller;
use DB;

class CommentsController extends Controller
{
    protected $productRepository;
    protected $commentRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->productRepository = $productRepository;
        $this->commentRepository = $commentRepository;
    }

    public function store(StoreCommentRequest $request)
    {
        $comment = $request->only('content', 'product_id', 'rate', 'user_id');

        DB::beginTransaction();

        try {
            $product = $this->productRepository->find($comment['product_id']);

            if ($product) {
                $rateTotal = $product->rate_total;
                $rateCount = $product->rate_count;
                $data['rate_total'] = intval($rateTotal) + intval($request->rate);
                $data['rate_count'] = intval($rateCount) + 1;

                $this->productRepository->update($data, $request->product_id);

                $this->commentRepository->create($comment);

                DB::commit();

                return redirect()->back()
                    ->withSuccess(trans('homepage.message.rate_successful'));
            }
        } catch (Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());

            return redirect()->back()
                ->withErrors(trans('homepage.message.rate_fail'));
        }
    }
}
