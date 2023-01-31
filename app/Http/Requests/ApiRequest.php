<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Params\RequestParams;

/**
 * Class ApiRequest
 * @package Sigma\Core\Http\Requests
 */
class ApiRequest extends FormRequest
{
    /**
     * @var string
     */
    protected string $params = RequestParams::class;

    /**
     * Protected function
     * @return \Sigma\Core\Http\Requests\Params\RequestParams
     */
    public function getParams(): RequestParams
    {
        return $this->params::fromRequest($this);
    }
}
