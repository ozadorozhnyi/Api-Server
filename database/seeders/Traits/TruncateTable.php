<?php

declare(strict_types=1);

namespace Database\Seeders\Traits;

use DB;

trait TruncateTable
{
    protected function truncate(string $table)
    {
        DB::table($table)->truncate();
    }
}