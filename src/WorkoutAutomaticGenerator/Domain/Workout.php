<?php
namespace EspServer\WorkoutAutomaticGenerator\Domain;

class Workout
{

    /** @var Exercise[] */
    private $exercises;

    public function exercises()
    {
        return $this->exercises;
    }
}