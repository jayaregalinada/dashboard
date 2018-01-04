<?php

namespace Jag\Dashboard\Traits;

trait CreateMigrationTrait
{
    public function createMigration($name, $timestamp, $currentDirectory)
    {
        $migrationClass = studly_case($name);

        if (! class_exists("CreateDashboard{$migrationClass}Table")) {
            $this->publishes([
                "{$currentDirectory}/../migrations/create_{$name}_table.php" => $this->app->databasePath() . "/migrations/{$timestamp}_create_{$name}_table.php",
            ], 'migrations');
        }
    }
}
