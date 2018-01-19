<?php

namespace EspServer\ExercisesCatalog\Query;

use EspServer\ExercisesCatalog\Domain\Exercise;
use EspServer\ExercisesCatalog\Infrastructure\InMemoryExercisesRepository;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class GetExercisesQueryHandlerTest extends TestCase
{
    public function testItHandles()
    {
        $repository = new InMemoryExercisesRepository();
        $repository->add(new Exercise(Uuid::uuid4()));
        $query = new GetExercisesQuery();
        $handler = new GetExercisesQueryHandler($repository);

        $response = $handler->handle($query);

        $this->assertCount(1, $response->value());
    }
}
