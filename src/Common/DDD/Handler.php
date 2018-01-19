<?php


namespace EspServer\Common\DDD;


interface Handler
{
    public function listenTo(): string;
}