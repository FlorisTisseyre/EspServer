<?php

namespace EspServer\ExercisesCatalog\Infrastructure;

use EspServer\ExercisesCatalog\Domain\Exercise;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class InMemoryExercisesRepositoryTest extends TestCase
{
    public function testItAddAndGet()
    {
        $repository = new InMemoryExercisesRepository();
        /** @var Uuid $uuid */
        $uuid = Uuid::uuid4();
        $repository->add(new Exercise($uuid));
        $actual = $repository->get($uuid)->uuid();

        $this->assertEquals($uuid, $actual);
    }

    public function testItDelete()
    {
        $repository = new InMemoryExercisesRepository();
        /** @var Uuid $uuid */
        $uuidFirst = Uuid::uuid4();
        /** @var Uuid $uuid */
        $uuidToDelete = Uuid::uuid4();
        /** @var Uuid $uuid */
        $uuidLast = Uuid::uuid4();

        $repository->add(new Exercise($uuidFirst));
        $repository->add(new Exercise($uuidToDelete));
        $repository->add(new Exercise($uuidLast));

        $repository->delete($uuidToDelete);

        $exercises = $repository->getAll();
        $this->assertCount(2, $exercises);
        $this->assertEquals($uuidFirst, reset($exercises)->uuid());
        $this->assertEquals($uuidLast, end($exercises)->uuid());
    }
}
