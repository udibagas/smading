<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SensorLog;
use SensorLog15;

class DeletePerDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unitron:delete1day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hapus log sensor dan appliance tiap 1 hari';

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
        // bikin summary per 15 menit dahulu
        DB::query('truncate table sensor_logs');
    }
}
