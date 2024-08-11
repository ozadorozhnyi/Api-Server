<?php

declare(strict_types=1);

namespace Database\Factories\Helpers;

use function rand;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FactoryHelper
{
    /**
     * This function will get a random model id from the database.
     *
     * @param string | HasFactory $model
     * @return int
     */
    public static function getRandomModelId(string $model): int
    {
        // get model count
        $count = $model::query()->count();
        if (0 === $count) {
            // if model count === 0
            // we should create a new record and retrieve the record id
            return $model::factory()->create()->id;
        } else {
            // generate a random number between 1 and model count
            return rand(1, $count);
        }
    }
}