<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audit;
use App\Http\Requests\AuditRequest;

class AuditController extends Controller
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

        return view('audit.index', [
            'audits' => Audit::orderBy($sort, $order)
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
        return view('audit.create', ['audit' => new Audit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuditRequest $request)
    {
        Audit::create($request->all());
        return redirect('/audit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Audit $audit)
    {
        return view('audit.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Audit $audit)
    {
        return view('audit.edit', ['audit' => $audit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuditRequest $request, Audit $audit)
    {
        $audit->update($request->all());
        return redirect('/audit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audit $audit)
    {
        $audit->delete();
        return redirect('/audit');
    }
}
