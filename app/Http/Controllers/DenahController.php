<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Denah;
use App\Http\Requests\DenahRequest;

class DenahController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'denahs.lantai';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $denahs = Denah::selectRaw('denahs.*, gedungs.name AS gedung')
            ->join('gedungs', 'gedungs.id', '=', 'denahs.gedung_id')
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('lantai', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('gedung.name', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $denahs->perPage(),
                'total' => $denahs->total(),
                'current' => $denahs->currentPage(),
                'rows' => $denahs->items(),
            ];
        }

        return view('denah.index', ['denahs' => $denahs]);
    }

    public function index1()
    {
        return view('denah.index1', ['denahs' => Denah::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('denah.create', ['denah' => new Denah]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DenahRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads', $fileName);
            $data['gambar'] = 'uploads/'.$fileName;
        }

        Denah::create($data);
        return redirect('/denah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Denah $denah)
    {
        return view('denah.show', ['denah' => $denah]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Denah $denah)
    {
        return view('denah.edit', ['denah' => $denah]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DenahRequest $request, Denah $denah)
    {
        $data = $request->all();

        if ($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads', $fileName);
            $data['gambar'] = 'uploads/'.$fileName;
        }

        $denah->update($data);
        return redirect('/denah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denah $denah)
    {
        if ($denah->gambar && file_exists($denah->gambar)) {
            unlink($denah->gambar);
        }

        return ['success' => $denah->delete()];
    }
}
