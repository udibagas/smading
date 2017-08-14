<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SnmpOid;
use App\Http\Requests\SnmpOidRequest;

class SnmpOidController extends Controller
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

        $snmpOids = SnmpOid::selectRaw('
                snmp_oids.*,
                appliances.name AS appliance,
                monitoring_parameters.name AS parameter
            ')
            ->join('appliances', 'appliances.id', '=', 'snmp_oids.appliance_id')
            ->join('monitoring_parameters', 'monitoring_parameters.id', '=', 'snmp_oids.monitoring_parameter_id', 'LEFT')
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('appliances.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('snmp_oids.description', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('data_type', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('snmp_oids.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('monitoring_parameters.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('oid', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $snmpOids->perPage(),
                'total' => $snmpOids->total(),
                'current' => $snmpOids->currentPage(),
                'rows' => $snmpOids->items(),
            ];
        }

        return view('snmpOid.index', ['snmpOids' => $snmpOids]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('snmpOid.create', ['snmpOid' => new SnmpOid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SnmpOidRequest $request)
    {
        SnmpOid::create($request->all());
        return redirect('/snmpOid');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SnmpOid $snmpOid)
    {
        return view('snmpOid.show', ['snmpOid' => $snmpOid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SnmpOid $snmpOid)
    {
        return view('snmpOid.edit', ['snmpOid' => $snmpOid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SnmpOidRequest $request, SnmpOid $snmpOid)
    {
        $snmpOid->update($request->all());
        return redirect('/snmpOid');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SnmpOid $snmpOid)
    {
        return ['success' => $snmpOid->delete()];
    }
}
