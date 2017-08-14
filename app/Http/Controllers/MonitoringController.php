<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Monitoring;
use App\Http\Requests\MonitoringRequest;

class MonitoringController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'gedungs.name';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $monitorings = Monitoring::selectRaw('
                monitorings.*,
                gedungs.name AS gedung,
                ruangs.name AS ruang,
                ruangs.lantai AS lantai,
                raks.name AS rak,
                monitoring_parameters.name AS parameter,
                monitoring_parameters.unit AS unit
            ')
            ->join('gedungs', 'gedungs.id', '=', 'monitorings.gedung_id')
            ->join('ruangs', 'ruangs.id', '=', 'monitorings.ruang_id')
            ->join('raks', 'raks.id', '=', 'monitorings.rak_id', 'LEFT')
            ->join('monitoring_parameters', 'monitoring_parameters.id', '=', 'monitorings.monitoring_parameter_id')
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('gedungs.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('ruangs.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('raks.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('monitoring_parameters.name', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $monitorings->perPage(),
                'total' => $monitorings->total(),
                'current' => $monitorings->currentPage(),
                'rows' => $monitorings->items(),
            ];
        }

        return view('monitoring.index', ['monitorings' => $monitorings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitoring.create', ['monitoring' => new Monitoring]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MonitoringRequest $request)
    {
        Monitoring::create($request->all());
        return redirect('/monitoring');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Monitoring $monitoring)
    {
        return view('monitoring.show', ['monitoring' => $monitoring]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitoring $monitoring)
    {
        return view('monitoring.edit', ['monitoring' => $monitoring]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MonitoringRequest $request, Monitoring $monitoring)
    {
        $monitoring->update($request->all());
        return redirect('/monitoring');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitoring $monitoring)
    {
        return ['success' => $monitoring->delete()];
    }
}
