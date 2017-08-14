<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemeliharaan;
use App\Http\Requests\PemeliharaanRequest;

class PemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = $request->pageSize ? $request->pageSize : 10;
        $sort = $request->sort ? $request->sort : 'id';
        $order = $request->order ? $request->order : 'DESC';

        return view('pemeliharaan.index', [
            'pemeliharaans' => Pemeliharaan::orderBy($sort, $order)
                        ->when($request->q, function($query) use ($request) {
                            return $query->where('catatan', 'LIKE', '%'.$request->q.'%');
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
        return view('pemeliharaan.create', ['pemeliharaan' => new Pemeliharaan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PemeliharaanRequest $request)
    {
        Pemeliharaan::create($request->all());
        return redirect('/pemeliharaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeliharaan $pemeliharaan)
    {
        return view('pemeliharaan.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemeliharaan $pemeliharaan)
    {
        return view('pemeliharaan.edit', ['pemeliharaan' => $pemeliharaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PemeliharaanRequest $request, Pemeliharaan $pemeliharaan)
    {
        $pemeliharaan->update($request->all());
        return redirect('/pemeliharaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeliharaan $pemeliharaan)
    {
        $pemeliharaan->delete();
        return redirect('/pemeliharaan');
    }
}
