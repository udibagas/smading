<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SensorLog;
use App\Http\Requests\SensorLogRequest;

class SensorLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = $request->rowCount > 0 ? $request->rowCount : 1000000;
        $request['page'] = $request->current;
        $sort = $request->sort ? key($request->sort) : 'sensor_logs.created_at';
        $dir = $request->sort ? $request->sort[$sort] : 'DESC';

        $sensorLogs = SensorLog::selectRaw('
                sensor_logs.*,
                monitoring_parameters.name AS parameter,
                monitoring_parameters.unit AS unit,
                sensors.code AS sensor,
                ruangs.name AS ruang,
                raks.name AS rak
            ')
            ->join('monitoring_parameters', 'monitoring_parameters.id', '=', 'sensor_logs.monitoring_parameter_id')
            ->join('sensors', 'sensors.id', '=', 'sensor_logs.sensor_id')
            ->join('ruangs', 'ruangs.id', '=', 'sensors.ruang_id')
            ->join('raks', 'raks.id', '=', 'sensors.rak_id', 'LEFT')
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('sensors.code', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('ruangs.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('raks.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('monitoring_parameters.name', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $sensorLogs->perPage(),
                'total' => $sensorLogs->total(),
                'current' => $sensorLogs->currentPage(),
                'rows' => $sensorLogs->items(),
            ];
        }

        return view('sensorLog.index', ['sensorLogs' => $sensorLogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sensorLog.create', ['sensorLog' => new SensorLog]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SensorLogRequest $request)
    {
        SensorLog::create($request->all());
        return redirect('/sensorLog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SensorLog $sensorLog)
    {
        return view('sensorLog.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SensorLog $sensorLog)
    {
        return view('sensorLog.edit', ['sensorLog' => $sensorLog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SensorLogRequest $request, SensorLog $sensorLog)
    {
        $sensorLog->update($request->all());
        return redirect('/sensorLog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SensorLog $sensorLog)
    {
        $sensorLog->delete();
        return redirect('/sensorLog');
    }

    public function poll(Request $request)
    {
        $log = SensorLog::join('sensors', 'sensors.id', '=', 'sensor_logs.sensor_id')
            ->where('sensors.ruang_id', $request->ruang_id)
            ->where('monitoring_parameter_id', $request->monitoring_parameter_id)
            ->when($request->rak_id, function($query) use ($request) {
                return $query->where('sensors.rak_id', $request->rak_id);
            })
            ->where('sensor_logs.created_at', 'LIKE', date('Y-m-d H:i:%'))
            ->orderBy('sensor_logs.created_at', 'DESC')->first();

        return $log ? $log->value : 0;
    }
}
