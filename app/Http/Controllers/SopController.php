<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sop;
use App\Http\Requests\SopRequest;

class SopController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'nomor';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $sops = Sop::when($request->searchPhrase, function($query) use ($request) {
            return $query
                ->where('nomor', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('judul', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('isi', 'LIKE', '%'.$request->searchPhrase.'%');
        })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $sops->perPage(),
                'total' => $sops->total(),
                'current' => $sops->currentPage(),
                'rows' => $sops->items(),
            ];
        }

        return view('sop.index', ['sops' => $sops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sop.create', ['sop' => new Sop]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SopRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        if ($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads', $fileName);
            $data['gambar'] = 'uploads/'.$fileName;
        }

        $sop = Sop::create($data);
        return redirect('/sop');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sop $sop)
    {
        return view('sop.show', ['sop' => $sop]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sop $sop)
    {
        return view('sop.edit', ['sop' => $sop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SopRequest $request, Sop $sop)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        if ($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads', $fileName);
            $data['gambar'] = 'uploads/'.$fileName;
        }

        $sop->update($data);

        return redirect('/sop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sop $sop)
    {
        $sop->delete();
        return redirect('/sop');
    }
}
