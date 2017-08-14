<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bukutamu;
use App\Http\Requests\BukutamuRequest;

class BukutamuController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'id';
        $dir = $request->sort ? $request->sort[$sort] : 'desc';

        $bukutamus = Bukutamu::when($request->searchPhrase, function($query) use ($request) {
            return $query->where('tujuan', 'LIKE', '%'.$request->searchPhrase.'%');
        })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $bukutamus->perPage(),
                'total' => $bukutamus->total(),
                'current' => $bukutamus->currentPage(),
                'rows' => $bukutamus->items(),
            ];
        }

        return view('bukutamu.index', ['bukutamus' => $bukutamus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bukutamu.create', ['bukutamu' => new Bukutamu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukutamuRequest $request)
    {
        Bukutamu::create($request->all());
        return redirect('/bukutamu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bukutamu $bukutamu)
    {
        return view('bukutamu.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bukutamu $bukutamu)
    {
        return view('bukutamu.edit', ['bukutamu' => $bukutamu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukutamuRequest $request, Bukutamu $bukutamu)
    {
        $bukutamu->update($request->all());
        return redirect('/bukutamu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bukutamu $bukutamu)
    {
        return ['success' => $bukutamu->delete()];
    }
}
