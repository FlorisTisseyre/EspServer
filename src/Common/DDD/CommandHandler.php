<?php


namespace EspServer\Common\DDD;


interface CommandHandler extends Handler
{
    public function handle(Command $command): CommandResponse;
}