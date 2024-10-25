<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Models\GrafischartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class GrafischartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $x = [];
        $x['rtch'] = [];
        $x['air_minum'] = [];
        $x['drainase'] = [];
        $x['kawasan_kumuh'] = [];
        $x['sanitasi'] = [];
        $d = GrafischartModel::get();
        foreach ($d as $key => $v) {
            if ($v->tipe == 'RTCH') {
                $x['rtch'][] = $v;
            }
            if ($v->tipe == 'AIR MINUM') {
                $x['air_minum'][] = $v;
            }
            if ($v->tipe == 'DRAINASE') {
                $x['drainase'][] = $v;
            }
            if ($v->tipe == 'KAWASAN KUMUH') {
                $x['kawasan_kumuh'][] = $v;
            }
            if ($v->tipe == 'SANITASI') {
                $x['sanitasi'][] = $v;
            }
        }
        // return $x;
        return view('importdata.grafischart', $x);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $insert = [];
        $excel = Excel::toArray(new DataImport, $request->filenya);
        foreach ($excel as $key => $v) {
            foreach ($v as $key => $va) {
                $data = [];
                if ($va[1] !== null) {
                    $data['tipe'] = $va[1];
                }
                if ($va[2] !== null) {
                    $data['komponen'] = $va[2];
                }
                if ($va[3] !== null) {
                    $data['satuan'] = $va[3];
                }
                if ($va[4] !== null) {
                    $data['tahun'] = $va[4];
                }
                if (count($data) >= 4) {
                    try {
                        GrafischartModel::updateOrCreate([
                            'tipe' => $va[1],
                            'tahun' => $va[4],
                        ], $data);
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }
            }
        }
        return Redirect::back()->with('info', 'Data berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
