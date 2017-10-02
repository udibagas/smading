<?php
namespace App\Console\Commands;

require_once dirname(__FILE__) . '/Phpmodbus/ModbusMaster.php';

use Illuminate\Console\Command;
use ModbusMaster;
use PhpType;

class ModbusTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:modbus {--ip_address=} {--device_id=} {--offset=} {--length=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test ambil data sensor dengan MODBUS TCP';

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
        $ip_address = $this->option('ip_address');
        $device_id = $this->option('device_id');
        $length = $this->option('length');
        $offset = $this->option('offset');

        $modbus = new ModbusMaster($ip_address, "TCP");
        $modbus->timeout_sec = 1;

        try {
            $recData = $modbus->readMultipleRegisters($device_id, $offset, $length);
        } catch (Exception $e) {
            $this->error('['.date('Y-m-d H:i:s').'] modbus '.$ip_address.' error : '.$e->getMessage());
            return;
        }

        $values     = array_chunk($recData, 2);
        $dataArray  = [];

        $header = ['OFFSET', 'DATA'];

        foreach($values as $bytes) {
            echo $bytes[0];
            $value = PhpType::bytes2unsignedInt($bytes);
            $dataArray[] = [$offset++, $value];
        }

        // $this->table($header, $dataArray);
    }
}
