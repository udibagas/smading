<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SensorLog15;
use App\Http\Requests\SensorLog15Request;

class SensorLog15Controller extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'sensor_log15s.created_at';
        $dir = $request->sort ? $request->sort[$sort] : 'DESC';

        $sensorLog15s = SensorLog15::selectRaw('
                sensor_log15s.*,
                monitoring_parameters.name AS parameter,
                monitoring_parameters.unit AS unit,
                sensors.code AS sensor,
                ruangs.name AS ruang,
                raks.name AS rak
            ')
            ->join('monitoring_parameters', 'monitoring_parameters.id', '=', 'sensor_log15s.monitoring_parameter_id')
            ->join('sensors', 'sensors.id', '=', 'sensor_log15s.sensor_id')
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
                'rowCount' => $sensorLog15s->perPage(),
                'total' => $sensorLog15s->total(),
                'current' => $sensorLog15s->currentPage(),
                'rows' => $sensorLog15s->items(),
            ];
        }

        return view('sensorLog15.index', ['sensorLog15s' => $sensorLog15s]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sensorLog15.create', ['sensorLog15' => new SensorLog15]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SensorLog15Request $request)
    {
        SensorLog15::create($request->all());
        return redirect('/sensorLog15');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SensorLog15 $sensorLog15)
    {
        return view('sensorLog15.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SensorLog15 $sensorLog15)
    {
        return view('sensorLog15.edit', ['sensorLog15' => $sensorLog15]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SensorLog15Request $request, SensorLog15 $sensorLog15)
    {
        $sensorLog15->update($request->all());
        return redirect('/sensorLog15');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SensorLog15 $sensorLog15)
    {
        $sensorLog15->delete();
        return redirect('/sensorLog15');
    }
}
