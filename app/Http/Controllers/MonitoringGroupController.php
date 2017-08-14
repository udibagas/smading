<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonitoringGroup;
use App\Http\Requests\MonitoringGroupRequest;

class MonitoringGroupController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'name';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $monitoringGroups = MonitoringGroup::when($request->searchPhrase, function($query) use ($request) {
            return $query
                ->where('name', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('description', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('protocol', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('manufacturer', 'LIKE', '%'.$request->searchPhrase.'%');
        })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $monitoringGroups->perPage(),
                'total' => $monitoringGroups->total(),
                'current' => $monitoringGroups->currentPage(),
                'rows' => $monitoringGroups->items(),
            ];
        }

        return view('monitoringGroup.index', ['monitoringGroups' => $monitoringGroups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitoringGroup.create', ['monitoringGroup' => new MonitoringGroup]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MonitoringGroupRequest $request)
    {
        MonitoringGroup::create($request->all());
        return redirect('/monitoringGroup');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MonitoringGroup $monitoringGroup)
    {
        return view('monitoringGroup.show', ['monitoringGroup' => $monitoringGroup]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MonitoringGroup $monitoringGroup)
    {
        return view('monitoringGroup.edit', ['monitoringGroup' => $monitoringGroup]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MonitoringGroupRequest $request, MonitoringGroup $monitoringGroup)
    {
        $monitoringGroup->update($request->all());
        return redirect('/monitoringGroup');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonitoringGroup $monitoringGroup)
    {
        return ['success' => $monitoringGroup->delete()];
    }
}
