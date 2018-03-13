<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonitoringGroup;
use App\MonitoringParameter;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $param = $request->parameter_id
            ? MonitoringParameter::find($request->parameter_id)
            : MonitoringParameter::orderBy('name', 'DESC')->first();

        return view('home.index', [
            'params' => MonitoringParameter::orderBy('name', 'DESC')->get(),
            'param' => $param
        ]);
    }
}
