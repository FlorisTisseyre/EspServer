<?php

namespace EspServer\WorkoutAutomaticGenerator\Command;


use EspServer\Common\DDD\CommandResponse;
use Ramsey\Uuid\Uuid;

class GenerateWorkoutCommandHandler
{

    public function __construct()
    {
    }


    public function handle(GenerateWorkoutCommand $command) : CommandResponse
    {
        $id = Uuid::uuid4();

        // TODO : donne moi tous les exercices possibles
        //$this->exercisesService->get();

        // TODO : générer et stocker la séance


        return new CommandResponse($id);
    }
}