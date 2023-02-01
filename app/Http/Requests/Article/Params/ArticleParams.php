<?php

namespace App\Http\Requests\Article\Params;

use App\Http\Requests\Params\RequestParams;

/**
 * Class ArticleParams
 */
class ArticleParams extends RequestParams
{
    /**
     * @var array|string[]
     */
    protected array $allowNullable = [];

    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $description;
}
