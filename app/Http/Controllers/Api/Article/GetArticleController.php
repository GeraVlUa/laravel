<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article\Article;

/**
 * Class GetArticleController
 * @package App\Http\Controllers\Api\Article
 */
class GetArticleController extends ApiController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Article $article): ArticleResource
    {
        return app(ArticleResource::class, ['resource' => $article]);
    }
}
