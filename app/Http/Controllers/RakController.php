<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rak;
use App\Http\Requests\RakRequest;

class RakController extends Controller
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

        $raks = Rak::selectRaw('raks.*, gedungs.name AS gedung, ruangs.name AS ruang, ruangs.lantai AS lantai')
            ->join('gedungs', 'gedungs.id', '=', 'raks.gedung_id')
            ->join('ruangs', 'ruangs.id', '=', 'raks.ruang_id')
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('code', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('description', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('ruang.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('gedung.name', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $raks->perPage(),
                'total' => $raks->total(),
                'current' => $raks->currentPage(),
                'rows' => $raks->items(),
            ];
        }

        return view('rak.index', ['raks' => $raks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rak.create', ['rak' => new Rak]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RakRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('layout'))
        {
            $file = $request->file('layout');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads', $fileName);
            $data['layout'] = 'uploads/'.$fileName;
        }

        Rak::create($data);
        return redirect('/rak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rak $rak)
    {
        return view('rak.show', ['rak' => $rak]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rak $rak)
    {
        return view('rak.edit', ['rak' => $rak]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RakRequest $request, Rak $rak)
    {
        $data = $request->all();

        if ($request->hasFile('layout'))
        {
            $file = $request->file('layout');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads', $fileName);
            $data['layout'] = 'uploads/'.$fileName;
        }

        $rak->update($data);
        return redirect('/rak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rak $rak)
    {
        return ['success' => $rak->delete()];
    }
}
