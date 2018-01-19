<?php
namespace EspServer\WorkoutAutomaticGenerator\Query;

use EspServer\Common\DDD\QueryResponse;
use EspServer\WorkoutAutomaticGenerator\Domain\Workout;

class GetWorkoutQueryHandler
{
    public function __construct()
    {
    }

    public function handle($query) : QueryResponse
    {
        $workout = new Workout();
        return new QueryResponse($workout);
    }
}