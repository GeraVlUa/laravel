<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Article\StoreArticleRequest;
use Illuminate\Http\JsonResponse;

class StoreArticle extends ApiController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(StoreArticleRequest $request): JsonResponse
    {
        dd($request->toArray());
        return $this->responseData([
            'test'
        ]);
    }
}
