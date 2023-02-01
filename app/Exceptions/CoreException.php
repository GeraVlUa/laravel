<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

/**
 * Class CoreException
 * @package App\Exceptions
 */
class CoreException extends \Exception implements HttpExceptionInterface
{
    /**
     * @var int
     */
    protected int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

    /**
     * @var array
     */
    protected array $headers = [];

    /**
     * @inheritDoc
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @inheritDoc
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}
