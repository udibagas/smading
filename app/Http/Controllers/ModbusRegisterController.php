<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModbusRegister;
use App\Http\Requests\ModbusRegisterRequest;

class ModbusRegisterController extends Controller
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

        $modbusRegisters = ModbusRegister::selectRaw('
                modbus_registers.*,
                appliances.name AS appliance,
                monitoring_parameters.name AS parameter
            ')
            ->join('appliances', 'appliances.id', '=', 'modbus_registers.appliance_id')
            ->join('monitoring_parameters', 'monitoring_parameters.id', '=', 'modbus_registers.monitoring_parameter_id', 'LEFT')
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('appliances.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('offset', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('data_type', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('monitoring_parameters.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('modbus_registers.description', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $modbusRegisters->perPage(),
                'total' => $modbusRegisters->total(),
                'current' => $modbusRegisters->currentPage(),
                'rows' => $modbusRegisters->items(),
            ];
        }

        return view('modbusRegister.index', ['modbusRegisters' => $modbusRegisters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modbusRegister.create', ['modbusRegister' => new ModbusRegister]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModbusRegisterRequest $request)
    {
        ModbusRegister::create($request->all());
        return redirect('/modbusRegister');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ModbusRegister $modbusRegister)
    {
        return view('modbusRegister.show', ['modbusRegister' => $modbusRegister]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ModbusRegister $modbusRegister)
    {
        return view('modbusRegister.edit', ['modbusRegister' => $modbusRegister]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModbusRegisterRequest $request, ModbusRegister $modbusRegister)
    {
        $modbusRegister->update($request->all());
        return redirect('/modbusRegister');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModbusRegister $modbusRegister)
    {
        return ['success' => $modbusRegister->delete()];
    }
}
