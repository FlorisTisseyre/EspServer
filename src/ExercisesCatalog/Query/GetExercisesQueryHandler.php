<?php

namespace EspServer\ExercisesCatalog\Query;

use EspServer\Common\DDD\QueryResponse;
use EspServer\ExercisesCatalog\Domain\ExercisesRepository;

class GetExercisesQueryHandler
{

    /** @var ExercisesRepository */
    private $repository;

    public function __construct(ExercisesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(GetExercisesQuery $query) : QueryResponse
    {
        $exercises = $this->repository->getAll();
        return new QueryResponse($exercises);
    }
}