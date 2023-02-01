<?php

namespace App\Http\Controllers\Api\Article;

use App\Actions\Article\StoreArticleAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Resources\Article\ArticleResource;
use Illuminate\Http\JsonResponse;

/**
 * Class StoreArticleController
 * @package App\Http\Controllers\Api\Article
 */
class StoreArticleController extends ApiController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(StoreArticleRequest $request, StoreArticleAction $action): JsonResponse
    {
        $article = $action->execute($request->getParams());

        return app(ArticleResource::class, ['resource' => $article]);

    }
}
