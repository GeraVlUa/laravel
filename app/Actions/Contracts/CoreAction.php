<?php

namespace App\Actions\Contracts;

/**
 * Interface CoreAction
 * @package App\Actions\Contracts
 */
interface CoreAction
{
    /**
     * Execute action
     * @param array $params
     * @return mixed
     */
    public function execute(...$params);
}
