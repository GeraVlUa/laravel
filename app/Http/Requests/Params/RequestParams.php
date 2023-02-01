<?php

namespace App\Http\Requests\Params;

use Illuminate\Support\Arr;
use ReflectionClass;
use App\Dto\BaseDataObject;
use App\Http\Requests\ApiRequest;

/**
 * Class RequestParams
 */
abstract class RequestParams extends BaseDataObject
{
    /**
     * Array of property names which can be nullable.
     * Temporary hack.
     *
     * @var string[]
     */
    protected array $allowNullable = [];

    /**
     * RequestParams constructor.
     * @param array $args
     * @throws \ReflectionException
     */
    public function __construct(...$args)
    {
        $ref   = new ReflectionClass($this);
        $props = $ref->getProperties();

        foreach ($props as $prop) {
            if ($prop->class !== get_class($this)) {
                continue;
            }
            $type = optional($prop->getType())->getName();
            if (!in_array($type, ['string', 'integer', 'int', 'double', 'float', 'boolean'])) {
                continue;
            }

            $canBeNullable = in_array($prop->name, $this->allowNullable);
            if (!$canBeNullable || ($canBeNullable && !is_null(Arr::get($args, $prop->name)))) {
                settype($args[$prop->name], $type);
            }
        }

        parent::__construct(...$args);
    }

    /**
     * Create from request
     * All logic related to map request data to form object
     * @param \App\Http\Requests\ApiRequest $request
     * @return \App\Http\Requests\Params\RequestParams
     * @throws \ReflectionException
     */
    public static function fromRequest(ApiRequest $request): RequestParams
    {
        return new static($request->all());
    }
}
