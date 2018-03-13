<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Sensor;
use App\SensorLog;

class Dummy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dummy:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk input data dummy';

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
        $sensors = Sensor::all();

        foreach ($sensor as $s) {
            SensorLog::insert([
                'sensor_id' => $s->id,
                'value' => rand(1,10)
            ]);
        }
    }
}
