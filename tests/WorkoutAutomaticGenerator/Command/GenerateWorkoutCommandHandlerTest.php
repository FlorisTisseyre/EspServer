<?php

namespace EspServer\WorkoutAutomaticGenerator\Command;

use EspServer\WorkoutAutomaticGenerator\Domain\Workout;
use EspServer\WorkoutAutomaticGenerator\Query\GetWorkoutQuery;
use EspServer\WorkoutAutomaticGenerator\Query\GetWorkoutQueryHandler;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class GenerateWorkoutCommandHandlerTest extends TestCase
{
    public function testItHandles()
    {
        $command = new GenerateWorkoutCommand();
        $handler = new GenerateWorkoutCommandHandler();
        $response = $handler->handle($command);

        $id = $response->value();
        $this->assertInstanceOf(Uuid::class, $id);
    }

    public function testItSaves()
    {
        $command = new GenerateWorkoutCommand();
        $commandHandler = new GenerateWorkoutCommandHandler();
        $commandResponse = $commandHandler->handle($command);
        $id = $commandResponse->value();

        $query = new GetWorkoutQuery($id);
        $queryHandler = new GetWorkoutQueryHandler();
        $queryResponse = $queryHandler->handle($query);

        /** @var Workout $workout */
        $workout = $queryResponse->value();

        $this->assertInstanceOf(Workout::class, $workout);

        // TODO : ligne à activer après codage
        //$this->assertEquals(6, count($workout->exercises()));
    }

}
