<?php

namespace App\Console\Commands;

use App\Jobs\NormalJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;

class SomeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:fake';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $batch = Bus::batch([])->dispatch();
        $batch->add([new NormalJob()]);

        return 0;
    }
}
