<?php

namespace EspServer\Common\DDD;


class CommandResponse
{

    private $value;

    /**
     * CommandResponse constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }
}