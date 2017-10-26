<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Pintu;
use App\Http\Requests\StaffRequest;

class StaffController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'nama';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $staffs = Staff::when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('nama', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('jabatan', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('fp_id', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('card_id', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $staffs->perPage(),
                'total' => $staffs->total(),
                'current' => $staffs->currentPage(),
                'rows' => $staffs->items(),
            ];
        }

        return view('staff.index', ['staffs' => $staffs]);
    }

    public function indexApi(Request $request)
    {
        return Staff::orderBy('nama', 'ASC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create', ['staff' => new Staff]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        $staff = Staff::where('uuid', $request->uuid)->first();

        if (!$staff) {
            $staff = Staff::create($request->all());
        }

        $pintu = Pintu::where('ip_address', $_SERVER['REMOTE_ADDR'])->first();

        if ($pintu) {
            $pintu->staff()->attach([$staff->id]);
        }

        return $staff;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return view('staff.show', ['staff' => $staff]);
    }

    public function showApi($id)
    {
        return Staff::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit', ['staff' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, Staff $staff)
    {
        $staff->update($request->all());
        $staff->pintu()->sync($request->akses);
        return redirect('/staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->pintu()->sync([]);
        return ['success' => $staff->delete()];
    }
}
