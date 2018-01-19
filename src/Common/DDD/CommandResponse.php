<?php

namespace EspServer\Common\DDD;


class CommandResponse
{

    private $value;

    
    private function __construct($value)
    {
        $this->value = $value;
    }
    
    /**
     * @param mixed $value
     * @return CommandResponse
     */
    public static function withValue($value ): CommandResponse{
        return new self($value);
    }
    
    
    public function value()
    {
        return $this->value;
    }
    
    
    
    
}