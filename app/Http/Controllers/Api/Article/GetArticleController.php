<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\ApiController;
use App\Models\Article\Article;
use Illuminate\Http\JsonResponse;

class GetArticleController extends ApiController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Article $article): JsonResponse
    {
        return $this->responseData([
            'test'
        ]);
    }
}
