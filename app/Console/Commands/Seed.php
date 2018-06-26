<?php

namespace App\Console\Commands;

use App\Tree;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Seed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trees:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Re-Run Migrations and seed 10 trees in the database.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->format('Clearing Database and running Migrations.');

        Artisan::call('migrate:fresh', [], $this->getOutput());

        $this->format('Creating 10 Trees in the database.');

        $trees = factory(Tree::class, 10)->create();

        $trees->each(function ($tree) {
            $this->info("Created {$tree->name} ({$tree->species})");
        });

        $this->format('Bye!');
    }

    /**
     * Format a things.
     *
     * @param string $message
     *
     * @return void
     */
    protected function format(string $message = '')
    {
        $this->info('');

        if (! empty($message)) {
            $line = str_repeat('-', strlen($message) + 4);

            $this->line($line);
            $this->line('* ' . $message . ' *');
            $this->line($line);
            $this->line('');

            return;
        }

        $this->line('----------------');
    }
}
