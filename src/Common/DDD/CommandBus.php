<?php


namespace EspServer\Common\DDD;


interface CommandBus extends Bus
{
    public function dispatch(Command $command): CommandResponse;
}