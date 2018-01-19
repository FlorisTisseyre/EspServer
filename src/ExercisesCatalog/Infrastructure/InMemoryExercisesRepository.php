<?php


namespace EspServer\ExercisesCatalog\Infrastructure;


use EspServer\ExercisesCatalog\Domain\Exercise;
use EspServer\ExercisesCatalog\Domain\ExercisesRepository;
use Ramsey\Uuid\Uuid;

class InMemoryExercisesRepository implements ExercisesRepository
{
    /** @var array|Exercise */
    private $exercises;

    public function __construct()
    {
        $this->exercises = [];
    }

    /**
     * @return array|Exercise[]
     */
    public function getAll() : array
    {
        return $this->exercises;
    }

    public function get(Uuid $uuid) : Exercise
    {
        $return = array_filter($this->exercises, function (Exercise $exercise) use ($uuid) {
            return $exercise->uuid()->equals($uuid);
        });

        // TODO : retourner un exercice null ici à la place de null
        return empty($return) ? null : $return[0];
    }

    public function add(Exercise $exercise) : void
    {
        $this->exercises[] = $exercise;
    }

    public function delete(Uuid $uuid)
    {
        $this->exercises = array_filter($this->exercises, function (Exercise $exercise) use ($uuid) {
            return !$exercise->uuid()->equals($uuid);
        });
    }
}