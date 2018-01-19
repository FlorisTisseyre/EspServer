<?php
namespace EspServer\WorkoutAutomaticGenerator\Query;

use EspServer\Common\DDD\Query;
use Ramsey\Uuid\Uuid;

class GetWorkoutQuery implements Query
{
    /** @var Uuid */
    private $id;

    public function __construct(Uuid $id)
    {
        $this->id = $id;
    }
}