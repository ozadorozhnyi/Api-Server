<?php

declare(strict_types=1);

namespace Database\Seeders\Traits;

use DB;

trait DisableForeignKeys
{
    protected function disableForeignKeys()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }

    protected function enableForeignKeys()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}