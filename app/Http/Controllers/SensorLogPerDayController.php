<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SensorLogPerDay;
use App\Http\Requests\SensorLogPerDayRequest;

class SensorLogPerDayController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'sensor_log_per_days.created_at';
        $dir = $request->sort ? $request->sort[$sort] : 'DESC';

        $sensorLogPerDays = SensorLogPerDay::selectRaw('
                sensor_log_per_days.*,
                monitoring_parameters.name AS parameter,
                monitoring_parameters.unit AS unit,
                sensors.code AS sensor,
                ruangs.name AS ruang,
                raks.name AS rak
            ')
            ->join('monitoring_parameters', 'monitoring_parameters.id', '=', 'sensor_log_per_days.monitoring_parameter_id')
            ->join('sensors', 'sensors.id', '=', 'sensor_log_per_days.sensor_id')
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
                'rowCount' => $sensorLogPerDays->perPage(),
                'total' => $sensorLogPerDays->total(),
                'current' => $sensorLogPerDays->currentPage(),
                'rows' => $sensorLogPerDays->items(),
            ];
        }

        return view('sensorLogPerDay.index', ['sensorLogPerDays' => $sensorLogPerDays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sensorLogPerDay.create', ['sensorLogPerDay' => new SensorLogPerDay]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SensorLogPerDayRequest $request)
    {
        SensorLogPerDay::create($request->all());
        return redirect('/sensorLogPerDay');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SensorLogPerDay $sensorLogPerDay)
    {
        return view('sensorLogPerDay.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SensorLogPerDay $sensorLogPerDay)
    {
        return view('sensorLogPerDay.edit', ['sensorLogPerDay' => $sensorLogPerDay]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SensorLogPerDayRequest $request, SensorLogPerDay $sensorLogPerDay)
    {
        $sensorLogPerDay->update($request->all());
        return redirect('/sensorLogPerDay');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SensorLogPerDay $sensorLogPerDay)
    {
        $sensorLogPerDay->delete();
        return redirect('/sensorLogPerDay');
    }
}
