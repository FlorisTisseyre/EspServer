<?php

namespace EspServer\WorkoutAutomaticGenerator\Command;


use EspServer\Common\DDD\Command;
use EspServer\Common\DDD\CommandHandler;
use EspServer\Common\DDD\CommandResponse;
use Ramsey\Uuid\Uuid;

class GenerateWorkoutCommandHandler implements CommandHandler
{

    public function __construct()
    {
    }


    public function handle(Command $command) : CommandResponse
    {
        $id = Uuid::uuid4();

        // TODO : donne moi tous les exercices possibles
        //$this->exercisesService->get();

        // TODO : générer et stocker la séance


        return CommandResponse::withValue($id);
    }
    
    public function listenTo(): string
    {
        return GenerateWorkoutCommand::class;
    }
}