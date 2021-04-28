<?php


namespace App\Modules\Shared\Model;

use App\Exceptions\KanBanException;
use ReflectionClass;

abstract class KanBanEnum
{
    protected $value;

    /**
     * SimplusEnum constructor.
     * @param $value
     * @throws KanBanException
     */
    public function __construct($value)
    {
        $reflection = new ReflectionClass(static::class);
        foreach ($reflection->getConstants() as $key => $val) {
            if ($value == $val) {
                $this->value = $value;
            }
        }

        if (!isset($this->value)) {
            throw $this->onErrorException();
        }
    }

    abstract protected function onErrorException(): KanBanException;

    public function getValue()
    {
        return $this->value;
    }
}
