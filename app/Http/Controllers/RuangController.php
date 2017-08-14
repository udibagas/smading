<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruang;
use App\Http\Requests\RuangRequest;

class RuangController extends Controller
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

        $ruangs = Ruang::selectRaw('ruangs.*, gedungs.name AS gedung')
            ->join('gedungs', 'gedungs.id', '=', 'ruangs.gedung_id')
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('code', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('description', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('gedung.name', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $ruangs->perPage(),
                'total' => $ruangs->total(),
                'current' => $ruangs->currentPage(),
                'rows' => $ruangs->items(),
            ];
        }

        return view('ruang.index', ['ruangs' => $ruangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruang.create', ['ruang' => new Ruang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuangRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('layout'))
        {
            $file = $request->file('layout');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads', $fileName);
            $data['layout'] = 'uploads/'.$fileName;
        }

        Ruang::create($data);
        return redirect('/ruang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ruang $ruang)
    {
        return view('ruang.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruang $ruang)
    {
        return view('ruang.edit', ['ruang' => $ruang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RuangRequest $request, Ruang $ruang)
    {
        $data = $request->all();

        if ($request->hasFile('layout'))
        {
            $file = $request->file('layout');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads', $fileName);
            $data['layout'] = 'uploads/'.$fileName;
        }

        $ruang->update($data);
        return redirect('/ruang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruang $ruang)
    {
        return ['success' => $ruang->delete()];
    }
}
