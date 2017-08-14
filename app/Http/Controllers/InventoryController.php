<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Http\Requests\InventoryRequest;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = $request->pageSize ? $request->pageSize : 10;
        $sort = $request->sort ? $request->sort : 'kode_registrasi';
        $order = $request->order ? $request->order : 'ASC';

        return view('inventory.index', [
            'inventorys' => Inventory::orderBy($sort, $order)
                        ->when($request->q, function($query) use ($request) {
                            return $query->where('kode_registrasi', 'LIKE', '%'.$request->q.'%');
                        })->paginate($pageSize)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create', ['inventory' => new Inventory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryRequest $request)
    {
        Inventory::create($request->all());
        return redirect('/inventory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        return view('inventory.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', ['inventory' => $inventory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryRequest $request, Inventory $inventory)
    {
        $inventory->update($request->all());
        return redirect('/inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect('/inventory');
    }
}
