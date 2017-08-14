<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeletePer15 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unitron:delete15min';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hapus log sensor dan appliance tiap 15 menit';

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
