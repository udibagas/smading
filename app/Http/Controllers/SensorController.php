<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;
use App\Http\Requests\SensorRequest;

class SensorController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'sensors.code';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $sensors = Sensor::selectRaw('
                sensors.*,
                gedungs.name AS gedung,
                ruangs.name AS ruang,
                ruangs.lantai AS lantai,
                appliances.name AS appliance,
                appliances.protocol AS protocol,
                raks.name AS rak
            ')
            ->join('gedungs', 'gedungs.id', '=', 'sensors.gedung_id')
            ->join('ruangs', 'ruangs.id', '=', 'sensors.ruang_id')
            ->join('appliances', 'appliances.id', '=', 'sensors.appliance_id')
            ->join('raks', 'raks.id', '=', 'sensors.rak_id', 'LEFT')
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('sensors.code', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('sensors.description', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('sensors.position', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('sensors.ip_address', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('ruangs.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('appliances.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('appliances.protocol', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('raks.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('gedungs.name', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $sensors->perPage(),
                'total' => $sensors->total(),
                'current' => $sensors->currentPage(),
                'rows' => $sensors->items(),
            ];
        }

        return view('sensor.index', ['sensors' => $sensors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sensor.create', ['sensor' => new Sensor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SensorRequest $request)
    {
        Sensor::create($request->all());
        return redirect('/sensor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sensor $sensor)
    {
        return view('sensor.show', ['sensor' => $sensor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor)
    {
        return view('sensor.edit', ['sensor' => $sensor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SensorRequest $request, Sensor $sensor)
    {
        $sensor->update($request->all());
        return redirect('/sensor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensor $sensor)
    {
        return ['success' => $sensor->delete()];
    }
}
