<?php


namespace EspServer\ExercisesCatalog\Domain;


use Ramsey\Uuid\Uuid;

interface ExercisesRepository
{
    /**
     * @return array|Exercise[]
     */
    public function getAll(): array;

    public function get(Uuid $uuid): Exercise;

    public function add(Exercise $exercise): void;

    public function delete(Uuid $uuid);
}