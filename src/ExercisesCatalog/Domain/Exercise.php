<?php


namespace EspServer\ExercisesCatalog\Domain;

use Ramsey\Uuid\Uuid;

class Exercise
{
    /** @var Uuid */
    private $uuid;

    public function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    public function uuid()
    {
        return $this->uuid;
    }
}