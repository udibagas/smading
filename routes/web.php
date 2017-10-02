<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\SensorLog;

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/alarm', 'AlarmController');
    Route::resource('/audit', 'AuditController');
    Route::resource('/bukutamu', 'BukutamuController');
    Route::get('/denah/index', 'DenahController@index1');
    Route::resource('/denah', 'DenahController');
    Route::resource('/gedung', 'GedungController');
    Route::resource('/inventory', 'InventoryController');
    Route::resource('/logPintu', 'LogPintuController', ['only' => ['index']]);
    Route::resource('/pemeliharaan', 'PemeliharaanController');
    Route::resource('/pintu', 'PintuController');
    Route::resource('/rak', 'RakController');
    Route::resource('/ruang', 'RuangController');
    Route::resource('/sensor', 'SensorController');
    Route::resource('/sensorLog', 'SensorLogController');
    Route::resource('/sensorLog15', 'SensorLog15Controller');
    Route::resource('/sensorLogPerDay', 'SensorLogPerDayController');
    Route::resource('/sop', 'SopController');
    Route::resource('/user', 'UserController');
    Route::resource('/appliance', 'ApplianceController');
    Route::resource('/applianceHttpApi', 'ApplianceHttpApiController');
    Route::resource('/modbusRegister', 'ModbusRegisterController');
    Route::resource('/monitoringParameter', 'MonitoringParameterController');
    Route::resource('/monitoringGroup', 'MonitoringGroupController');
    Route::resource('/monitoring', 'MonitoringController');
    Route::resource('/snmpOid', 'SnmpOidController');
    Route::resource('/setting', 'SettingController', ['except' => ['show']]);

    // main menu

    Route::get('/pemantauan', function() {
        return view ('pemantauan', [
            'monitoringGroups' => \App\MonitoringGroup::all(),
            'ruangs' => \App\Ruang::all(),
            'raks' => \App\Rak::all(),
            'pintus' => \App\Pintu::all(),
        ]);
    });

    Route::get('/tata-kelola', function() {
        return view ('tata-kelola');
    });

    Route::get('/asset', function() {
        return view ('asset');
    });

    Route::get('/rekaman', function() {
        return view ('rekaman');
    });

    Route::get('/tren', function() {
        return view ('tren');
    });

    Route::get('/it-peripheral', function() {
        return view ('it-peripheral');
    });

    Route::get('/master-data', function() {
        return view ('master-data');
    });

    Route::get('/pac', function() {
        return view('pac');
    });

    Route::get('/pac-snmp', function() {
        $ip = '192.168.1.52';

        // $snmp_1 = snmpget($ip, 'public', '.1.3.6.1.4.1.9839.2.1.2.1.0'); // temperature
        // $snmp_2 = snmpget($ip, 'public', '.1.3.6.1.4.1.9839.2.1.2.6.0'); // humidity
        //
        // $value_1 = substr($snmp_1, -3)/10;
        // $value_2 = substr($snmp_2, -3)/10;

        $value_1 = mt_rand(16*10, 33*10)/10;
        $value_2 = mt_rand(16*10, 33*10)/10;

        SensorLog::create(['sensor_id' => 1, 'value' => $value_1]);
        SensorLog::create(['sensor_id' => 2, 'value' => $value_2]);

        $sensor_1 = SensorLog::select('value')
            ->where('sensor_id', '=', 1)
            ->latest()->take(30)->get()->toArray();

        $sensor_2 = SensorLog::select('value')
            ->where('sensor_id', '=', 2)
            ->latest()->take(30)->get()->toArray();

        $data = [
            'value_1' => $value_1,
            'value_2' => $value_2,
            'data_1' => array_reverse(array_flatten($sensor_1)),
            'data_2' => array_reverse(array_flatten($sensor_2)),
        ];

        return json_encode($data, JSON_NUMERIC_CHECK);

    });

    Route::get('poll', 'SensorLogController@poll');

});
