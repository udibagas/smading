<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplianceHttpApi;
use App\Http\Requests\ApplianceHttpApiRequest;

class ApplianceHttpApiController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'appliances.name';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $applianceHttpApis = ApplianceHttpApi::selectRaw('
                appliance_http_apis.*,
                appliances.name AS appliance,
                monitoring_parameters.name AS parameter
            ')
            ->join('appliances', 'appliances.id', '=', 'appliance_http_apis.appliance_id')
            ->join('monitoring_parameters', 'monitoring_parameters.id', '=', 'appliance_http_apis.monitoring_parameter_id', 'LEFT')
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('appliances.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('url', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('data_type', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('monitoring_parameters.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('monitoring_parameters.description', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $applianceHttpApis->perPage(),
                'total' => $applianceHttpApis->total(),
                'current' => $applianceHttpApis->currentPage(),
                'rows' => $applianceHttpApis->items(),
            ];
        }

        return view('applianceHttpApi.index', ['applianceHttpApis' => $applianceHttpApis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applianceHttpApi.create', ['applianceHttpApi' => new ApplianceHttpApi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplianceHttpApiRequest $request)
    {
        ApplianceHttpApi::create($request->all());
        return redirect('/applianceHttpApi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ApplianceHttpApi $applianceHttpApi)
    {
        return view('applianceHttpApi.show', ['applianceHttpApi' => $applianceHttpApi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplianceHttpApi $applianceHttpApi)
    {
        return view('applianceHttpApi.edit', ['applianceHttpApi' => $applianceHttpApi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplianceHttpApiRequest $request, ApplianceHttpApi $applianceHttpApi)
    {
        $applianceHttpApi->update($request->all());
        return redirect('/applianceHttpApi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplianceHttpApi $applianceHttpApi)
    {
        return ['success' => $applianceHttpApi->delete()];
    }
}
