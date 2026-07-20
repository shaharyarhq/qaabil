<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Optimize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migration, cache clear, and other setup tasks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting optimizing...');
        $this->call('optimize:clear');
        $this->call('optimize');
        $this->call('filament:cache-components');
        $this->call('icons:cache');
        $this->info('complete!');
    }
}
