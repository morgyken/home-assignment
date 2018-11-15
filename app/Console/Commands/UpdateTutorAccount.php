<?php

namespace App\Console\Commands;

use App\Http\Controllers\HomeController;

use Illuminate\Console\Command;

class UpdateTutorAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateTutorAccount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign Tutors Questions';

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
     * @return mixed
     */
    public function handle()
    {
        
            /*
            * Update database everyday 
            */

            $app = new HomeController();

            /*
            * Update database after five seconds 
            */

            $app->PostSuspension();        
                 
    }
}
