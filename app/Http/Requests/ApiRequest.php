<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Params\RequestParams;

/**
 * Class ApiRequest
 * @package App\Http\Requests
 */
class ApiRequest extends FormRequest
{
    /**
     * @var string
     */
    protected string $params = RequestParams::class;

    /**
     * Protected function
     * @return \App\Http\Requests\Params\RequestParams
     */
    public function getParams(): RequestParams
    {
        return $this->params::fromRequest($this);
    }
}
