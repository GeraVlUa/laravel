<?php

namespace App\Actions\Article;

use App\Actions\CoreAction;
use App\Http\Requests\Article\Params\ArticleParams;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

/**
 * Class GetArticlesAction
 * @package App\Actions\Article
 */
class GetArticlesAction extends CoreAction
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return Article
     */
    public function handle(): Collection
    {
        return app(Article::class)->all();
    }
}
