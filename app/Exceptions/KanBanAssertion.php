<?php

namespace App\Exceptions;

use Exception;

class KanBanAssertion extends Exception
{
    /**
     * @param $condition
     * @param KanBanException $exception
     * @throws KanBanException
     */
    public static function assert($condition, KanBanException $exception)
    {
        if (!$condition)
            throw $exception;
    }
}
