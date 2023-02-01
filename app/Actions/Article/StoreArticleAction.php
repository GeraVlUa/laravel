<?php

namespace App\Actions\Article;

use App\Actions\CoreAction;
use App\Http\Requests\Article\Params\ArticleParams;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article\Article;
use Illuminate\Http\JsonResponse;
use App\Repositories\Criteria\EnabledCriteria;
use App\Repositories\CurrencyRepository;

/**
 * Class StoreArticleAction
 * @package App\Actions\Article
 */
class StoreArticleAction extends CoreAction
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
    public function handle(ArticleParams $params): Article
    {
        return app(Article::class)->create([
            'title' => $params->title,
            'description' => $params->description,
        ]);
    }
}
