<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gedung;
use App\Http\Requests\GedungRequest;

class GedungController extends Controller
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

        $gedungs = Gedung::when($request->searchPhrase, function($query) use ($request) {
            return $query
                ->where('name', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('code', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('description', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('jumlah_lantai', 'LIKE', '%'.$request->searchPhrase.'%');
        })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $gedungs->perPage(),
                'total' => $gedungs->total(),
                'current' => $gedungs->currentPage(),
                'rows' => $gedungs->items(),
            ];
        }

        return view('gedung.index', ['gedungs' => $gedungs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gedung.create', ['gedung' => new Gedung]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GedungRequest $request)
    {
        Gedung::create($request->all());
        return redirect('/gedung');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gedung $gedung)
    {
        return view('gedung.show', ['gedung' => $gedung]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gedung $gedung)
    {
        return view('gedung.edit', ['gedung' => $gedung]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GedungRequest $request, Gedung $gedung)
    {
        $gedung->update($request->all());
        return redirect('/gedung');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gedung $gedung)
    {
        return ['success' => $gedung->delete()];
    }
}
