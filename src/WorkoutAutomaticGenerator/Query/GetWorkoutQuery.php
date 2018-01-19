<?php
namespace EspServer\WorkoutAutomaticGenerator\Query;

use Ramsey\Uuid\Uuid;

class GetWorkoutQuery
{
    /** @var Uuid */
    private $id;

    function __construct(Uuid $id)
    {
        $this->id = $id;
    }
}