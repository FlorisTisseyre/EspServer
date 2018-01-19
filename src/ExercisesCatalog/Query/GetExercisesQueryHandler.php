<?php

namespace EspServer\ExercisesCatalog\Query;

use EspServer\Common\DDD\Query;
use EspServer\Common\DDD\QueryHandler;
use EspServer\Common\DDD\QueryResponse;
use EspServer\ExercisesCatalog\Domain\ExercisesRepository;

class GetExercisesQueryHandler implements QueryHandler
{

    /** @var ExercisesRepository */
    private $repository;

    public function __construct(ExercisesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(Query $query) : QueryResponse
    {
        $exercises = $this->repository->getAll();
        return new QueryResponse($exercises);
    }
    
    
    public function listenTo(): string
    {
        return GetExercisesQuery::class;
    }
}