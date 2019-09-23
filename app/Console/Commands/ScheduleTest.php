<?php

namespace App\Console\Commands;

use App\Food;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class ScheduleTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task test';

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
        $food = new Food();
        $food->cantidad = 666;
        $food->fecha = "2021-09-19";
        $food->hora = "00:00:00";
        $food->save();
        echo "xd\n";

        

        
    }
}
