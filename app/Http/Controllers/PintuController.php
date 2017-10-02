<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pintu;
use App\Http\Requests\PintuRequest;

class PintuController extends Controller
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

        $pintus = Pintu::selectRaw('pintus.*, pintus.status AS stts, gedungs.name AS gedung, ruangs.name AS ruang, ruangs.lantai AS lantai')
            ->join('gedungs', 'gedungs.id', '=', 'pintus.gedung_id')
            ->join('ruangs', 'ruangs.id', '=', 'pintus.ruang_id')
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('pintus.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('pintus.code', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('pintus.description', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('pintus.ip_address', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('ruang.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('gedung.name', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $pintus->perPage(),
                'total' => $pintus->total(),
                'current' => $pintus->currentPage(),
                'rows' => $pintus->items(),
            ];
        }

        return view('pintu.index', ['pintus' => $pintus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pintu.create', ['pintu' => new Pintu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PintuRequest $request)
    {
        Pintu::create($request->all());
        return redirect('/pintu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pintu $pintu, Request $request)
    {
        if ($request->ajax()) {
            return $pintu;
        }

        return view('pintu.show', ['pintu' => $pintu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pintu $pintu)
    {
        return view('pintu.edit', ['pintu' => $pintu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PintuRequest $request, Pintu $pintu)
    {
        $pintu->update($request->all());
        return redirect('/pintu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pintu $pintu)
    {
        return ['success' => $pintu->delete()];
    }
}
