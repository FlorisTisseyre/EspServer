<?php


namespace EspServer\Common\DDD;


interface QueryHandler extends Handler {
    public function handle (Query $message);
}