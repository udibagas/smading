<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appliance;
use App\Http\Requests\ApplianceRequest;

class ApplianceController extends Controller
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

        $appliances = Appliance::when($request->searchPhrase, function($query) use ($request) {
            return $query
                ->where('name', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('description', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('protocol', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('manufacturer', 'LIKE', '%'.$request->searchPhrase.'%');
        })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $appliances->perPage(),
                'total' => $appliances->total(),
                'current' => $appliances->currentPage(),
                'rows' => $appliances->items(),
            ];
        }

        return view('appliance.index', ['appliances' => $appliances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appliance.create', ['appliance' => new Appliance]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplianceRequest $request)
    {
        Appliance::create($request->all());
        return redirect('/appliance');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appliance $appliance)
    {
        return view('appliance.show', ['appliance' => $appliance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appliance $appliance)
    {
        return view('appliance.edit', ['appliance' => $appliance]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplianceRequest $request, Appliance $appliance)
    {
        $appliance->update($request->all());
        return redirect('/appliance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appliance $appliance)
    {
        return ['success' => $appliance->delete()];
    }
}
