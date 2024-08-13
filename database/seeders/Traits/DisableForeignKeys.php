<?php

declare(strict_types=1);

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait DisableForeignKeys
{
    protected function disableForeignKeys()
    {
        $command_prefix = $this->getCommandPrefix();
        DB::statement("{$command_prefix} FOREIGN_KEY_CHECKS=0;");
    }

    protected function enableForeignKeys()
    {
        $command_prefix = $this->getCommandPrefix();
        DB::statement("{$command_prefix} FOREIGN_KEY_CHECKS=1;");
    }

    /**
     * MySQL & SQLite uses different command prefixes to
     * enable/disable foreign key checks. This function
     * allows to determine used driver prefix and substitute
     * required command prefix.
     *
     *  MySQL - SET
     *  SQLite – PRAGMA
     *
     * @return string
     */
    private function getCommandPrefix(): string
    {
        $command_prefixes = [
            'mysql' => 'SET',
            'sqlite' => 'PRAGMA',
        ];

        return $command_prefixes[DB::connection()->getDriverName()] ?? 'SET';
    }

}
