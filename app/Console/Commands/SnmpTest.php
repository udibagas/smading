<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SnmpTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:snmp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test ambil data sensor dengan SNMP';

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
        //
    }
}
