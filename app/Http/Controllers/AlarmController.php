<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alarm;
use App\Http\Requests\AlarmRequest;

class AlarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = $request->pageSize ? $request->pageSize : 10;
        $sort = $request->sort ? $request->sort : 'name';
        $order = $request->order ? $request->order : 'ASC';

        return view('alarm.index', [
            'alarms' => Alarm::orderBy($sort, $order)
                        ->when($request->q, function($query) use ($request) {
                            return $query->where('pesan', 'LIKE', '%'.$request->q.'%');
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
        return view('alarm.create', ['alarm' => new Alarm]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlarmRequest $request)
    {
        Alarm::create($request->all());
        return redirect('/alarm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Alarm $alarm)
    {
        return view('alarm.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Alarm $alarm)
    {
        return view('alarm.edit', ['alarm' => $alarm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlarmRequest $request, Alarm $alarm)
    {
        $alarm->update($request->all());
        return redirect('/alarm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alarm $alarm)
    {
        $alarm->delete();
        return redirect('/alarm');
    }
}
