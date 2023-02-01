<?php

namespace App\Actions;

use App\Actions\Contracts\CoreAction as CoreActionContract;
use App\Actions\Traits\UsesDatabase;
use App\Exceptions\Contracts\CommitOnFailure;
use App\Exceptions\MethodNotImplementedException;
use Throwable;

/**
 * Class CoreAction
 */
abstract class CoreAction implements CoreActionContract
{
    use UsesDatabase;

    /**
     * Should our action use transactions
     * @var bool
     */
    protected bool $useTransactions = true;

    /**
     * Handle action
     * @param array $params
     * @return mixed
     * @throws \Throwable
     */
    public function execute(...$params)
    {
        try {
            $this->useTransactions && $this->beginTransaction();

            if (!method_exists($this, 'handle')) {
                throw new MethodNotImplementedException('Method "handle" does not exist in: ' . get_class($this));
            }

            $result = $this->handle(...$params);
        } catch (Throwable $e) {
            $this->processFailure($e);
        }

        $this->beforeCommit();
        if ($this->useTransactions) {
            $this->commit();
        }

        if (method_exists($this, 'afterCoreActionCommit')) {
            $this->afterCoreActionCommit(...$params);
        }

        return $result;
    }

    /**
     * @param \Throwable $e
     * @throws \Throwable
     */
    private function processFailure(Throwable $e)
    {
        if ($e instanceof CommitOnFailure) {
            $this->commit();
        } else {
            $this->beforeRollBack();
            $this->useTransactions && $this->rollBack();
        }

        throw $e;
    }
}
