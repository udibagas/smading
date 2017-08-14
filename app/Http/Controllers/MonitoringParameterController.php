<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonitoringParameter;
use App\Http\Requests\MonitoringParameterRequest;

class MonitoringParameterController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'monitoring_parameters.name';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $monitoringParameters = MonitoringParameter::selectRaw('monitoring_parameters.*, monitoring_groups.name AS `group`')
            ->join('monitoring_groups', 'monitoring_groups.id', '=', 'monitoring_parameters.monitoring_group_id')
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('monitoring_parameters.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->where('monitoring_groups.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('description', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('unit', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $monitoringParameters->perPage(),
                'total' => $monitoringParameters->total(),
                'current' => $monitoringParameters->currentPage(),
                'rows' => $monitoringParameters->items(),
            ];
        }

        return view('monitoringParameter.index', ['monitoringParameters' => $monitoringParameters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitoringParameter.create', ['monitoringParameter' => new MonitoringParameter]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MonitoringParameterRequest $request)
    {
        MonitoringParameter::create($request->all());
        return redirect('/monitoringParameter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MonitoringParameter $monitoringParameter)
    {
        return view('monitoringParameter.show', ['monitoringParameter' => $monitoringParameter]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MonitoringParameter $monitoringParameter)
    {
        return view('monitoringParameter.edit', ['monitoringParameter' => $monitoringParameter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MonitoringParameterRequest $request, MonitoringParameter $monitoringParameter)
    {
        $monitoringParameter->update($request->all());
        return redirect('/monitoringParameter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonitoringParameter $monitoringParameter)
    {
        return ['success' => $monitoringParameter->delete()];
    }
}
