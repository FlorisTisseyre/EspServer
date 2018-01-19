<?php
namespace EspServer\WorkoutAutomaticGenerator\Query;

use EspServer\Common\DDD\Query;
use EspServer\Common\DDD\QueryHandler;
use EspServer\Common\DDD\QueryResponse;
use EspServer\WorkoutAutomaticGenerator\Domain\Workout;

class GetWorkoutQueryHandler implements QueryHandler
{
    public function __construct()
    {
    }

    public function handle(Query $query) : QueryResponse
    {
        $workout = new Workout();
        return new QueryResponse($workout);
    }
    
    public function listenTo(): string
    {
        return GetWorkoutQuery::class;
    }
}