<?php

namespace App\Http\Resources\Article;

use App\Http\Resources\Resource;

/**
 * Class ArticleResource
 * @package App\Http\Resources
 * @property-read \App\Models\Article\Article $resource
 */
class ArticleResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'created_at' => $this->resource->created_at->toDateTimeString(),
        ];
    }
}
