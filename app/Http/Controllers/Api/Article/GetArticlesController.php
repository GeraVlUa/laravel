<?php

namespace App\Http\Controllers\Api\Article;

use App\Actions\Article\GetArticlesAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Article\ArticleResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class GetArticlesController
 * @package App\Http\Controllers\Api\Article
 */
class GetArticlesController extends ApiController
{
    /**
     * @param GetArticlesAction $action
     * @return AnonymousResourceCollection
     */
    public function __invoke(GetArticlesAction $action): AnonymousResourceCollection
    {
        return ArticleResource::collection($action->handle());
    }
}
