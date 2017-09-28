<?php

namespace App\Console\Commands;

require_once dirname(__FILE__) . '/Phpmodbus/ModbusMaster.php';

use Illuminate\Console\Command;
use App\Sensor;
use App\SensorLog;
use SNMP;
use Exception;
use ModbusMaster;

class Unitron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unitron:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ambil data semua sensor dan appliance kemudian simpan di database';

    protected $sleep = 5;

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
        $sensors = Sensor::where('monitor', 1)->get();

        while (true) {
            foreach ($sensors as $sensor) {
                if ($sensor->appliance->protocol == 'snmp') {
                    $this->snmp($sensor);
                } else {
                    $this->modbustcp($sensor);
                }
            }

            sleep($this->sleep);
        }
    }

    protected function snmp($sensor)
    {
        // switch ($sensor->snmp_version) {
        //     case '2c':
        //         $snmp_version = SNMP::VERSION_2C;
        //         break;
        //
        //     case '3':
        //         $snmp_version = SNMP::VERSION_3;
        //         break;
        //
        //     default:
        //         $snmp_version = SNMP::VERSION_1;
        //         break;
        // }
        //
        // $snmp = new SNMP($snmp_version, $sensor->ip_address, $sensor->snmp_community);
        // $snmp->exceptions_enabled = SNMP::ERRNO_ANY;

        foreach ($sensor->appliance->snmpOid as $snmpOid)
        {
            // if ($snmpOid->monitor == 0) {
            //     continue;
            // }
            //
            // $oid = $snmpOid->name ? $snmpOid->name : $snmpOid->oid;
            // $snmpCommand = "snmpget -v ".$sensor->snmp_version." -c ".$sensor->snmp_community." ".$sensor->ip_address." ".$oid."\n";
            //
            // try {
            //     $snmpOutput = $snmp->get($oid);
            // } catch (Exception $e) {
            //     $this->error('['.date('Y-m-d H:i:s').'] '.$snmpCommand.': '.$e->getMessage());
            //     continue;
            // }

            // pake ini
            // list($substrStart, $substrEnd) = explode(',', $snmpOid->substr_output);
            // $valueRaw   = substr($snmpOutput, $substrStart, $substrEnd);
            // $value      = $this->convertValue($valueRaw, $snmpOid->conversion);

            // atau ini
            preg_match_all('!\d+!', $snmpOutput, $matches);
            $value = $matches[0];

            // for test only
            $value = mt_rand(1,99);

            $data = SensorLog::create([
                'sensor_id' => $sensor->id,
                'monitoring_parameter_id' => $snmpOid->monitoring_parameter_id,
                'value' => $value
            ]);

            if ($data) {
                $this->info('['.date('Y-m-d H:i:s').'] '.$sensor->ip_address.' ('.$snmpOid->description.') : '.$value.$snmpOid->unit);
            } else {
                $this->error('['.date('Y-m-d H:i:s').'] Failed to save to db');
            }
        }

        // $snmp->close();
    }

    protected function modbustcp($sensor)
    {
        // $modbus = new ModbusMaster($sensor->ip_address, "TCP");
        // $modbus->timeout_sec = 1;
        // $length = $sensor->modbus_offset_end - $sensor->modbus_offset_start;
        // $offset = $sensor->modbus_offset_start;
        //
        // try {
        //     $recData = $modbus->readMultipleRegisters(0, $offset, $length);
        // } catch (Exception $e) {
        //     $this->error('['.date('Y-m-d H:i:s').'] modbus '.$sensor->ip_address.' error : '.$e->getMessage());
        //     return;
        // }
        //
        // $values     = array_chunk($recData, 2);
        // $dataArray  = [];
        //
        // foreach($values as $bytes) {
        //     $value = PhpType::bytes2unsignedInt($bytes);
        //     $dataArray[$offset++] = $value;
        // }

        foreach ($sensor->appliance->modbusRegister as $modbusRegister)
        {
            if ($modbusRegister->monitor == 0) {
                continue;
            }

            // $value = $this->convertValue($dataArray[$modbusRegister->offset], $modbusRegister->conversion);
            // for test only
            $value = mt_rand(1,99);

            $data = SensorLog::create([
                'sensor_id' => $sensor->id,
                'monitoring_parameter_id' => $modbusRegister->monitoring_parameter_id,
                'value' => $value
            ]);

            if ($data) {
                $this->info('['.date('Y-m-d H:i:s').'] '.$sensor->ip_address.' ('.$modbusRegister->description.') : '.$value.$modbusRegister->unit);
            } else {
                $this->error('['.date('Y-m-d H:i:s').'] Failed to save to db');
            }
        }
    }

    protected function convertValue($valueRaw, $conversion)
    {
        switch (substr($conversion, 0,1)) {
            case '/':
                $value = $valueRaw / substr($conversion, 1);
                break;

            case '*':
                $value = $valueRaw * substr($conversion, 1);
                break;

            case '-':
                $value = $valueRaw - substr($conversion, 1);
                break;

            case '+':
                $value = $valueRaw + substr($conversion, 1);
                break;

            default:
                $value = $valueRaw;
                break;
        }

        return $value;
    }
}
