<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'parameter';
        $dir = $request->sort ? $request->sort[$sort] : 'asc';

        $settings = Setting::when($request->searchPhrase, function($query) use ($request) {
            return $query
                ->where('parameter', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('description', 'LIKE', '%'.$request->searchPhrase.'%')
                ->orWhere('value', 'LIKE', '%'.$request->searchPhrase.'%');
        })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $settings->perPage(),
                'total' => $settings->total(),
                'current' => $settings->currentPage(),
                'rows' => $settings->items(),
            ];
        }

        return view('setting.index', ['settings' => $settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.create', ['setting' => new Setting]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        Setting::create($request->all());
        return redirect('/setting');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('setting.edit', ['setting' => $setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());
        return redirect('/setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        return ['success' => $setting->delete()];
    }
}
