<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogPintu;
use App\Pintu;

class LogPintuController extends Controller
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
        $sort = $request->sort ? key($request->sort) : 'log_pintus.created_at';
        $dir = $request->sort ? $request->sort[$sort] : 'DESC';

        $logPintus = LogPintu::selectRaw('log_pintus.created_at, log_pintus.access_by, log_pintus.status AS stts, pintus.name AS name, pintus.code AS code, pintus.description AS description, pintus.ip_address AS ip_address, gedungs.name AS gedung, ruangs.name AS ruang, ruangs.lantai AS lantai')
            ->join('pintus', 'pintus.id', '=', 'log_pintus.pintu_id')
            ->join('gedungs', 'gedungs.id', '=', 'pintus.gedung_id')
            ->join('ruangs', 'ruangs.id', '=', 'pintus.ruang_id')
            ->when($request->pintu_id, function($query) use ($request) {
                return $query->where('log_pintus.pintu_id', $request->pintu_id);
            })
            ->when($request->ruang_id, function($query) use ($request) {
                return $query->where('pintus.ruang_id', $request->ruang_id);
            })
            ->when($request->searchPhrase, function($query) use ($request) {
                return $query
                    ->where('pintus.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('pintus.code', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('pintus.description', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('pintus.ip_address', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('log_pintus.access_by', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('ruangs.name', 'LIKE', '%'.$request->searchPhrase.'%')
                    ->orWhere('gedungs.name', 'LIKE', '%'.$request->searchPhrase.'%');
            })->orderBy($sort, $dir)->paginate($pageSize);

        if ($request->ajax()) {
            return [
                'rowCount' => $logPintus->perPage(),
                'total' => $logPintus->total(),
                'current' => $logPintus->currentPage(),
                'rows' => $logPintus->items(),
            ];
        }

        return view('logPintu.index', ['logPintus' => $logPintus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pintu = Pintu::where('ip_address', $_SERVER['REMOTE_ADDR'])->first();

        if ($pintu) {
            $data = $request->all();
            $data['pintu_id'] = $pintu->id;
            $log = LogPintu::create($data);

            // update status pintu
            $pintu->last_access_time = $log->created_at;
            $pintu->last_access_by = $log->access_by;
            $pintu->status = $log->status;
            $pintu->save();

            return $log;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogPintu $logPintu)
    {
        return ['success' => $logPintu->delete()];
    }
}
