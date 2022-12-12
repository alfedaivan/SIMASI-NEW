<?php

namespace App\Http\Controllers;

use App\Models\Pengungsi;
use App\Models\Posko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengungsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pengungsi = Pengungsi::select(
            DB::raw("concat('Prov. ',pengungsi.provinsi,', Kota ',pengungsi.kota,',
            Kec. ',pengungsi.kecamatan,', Ds. ',pengungsi.kelurahan,', 
            Daerah ',pengungsi.detail,' ')
        as lokasi"),
            'pengungsi.nama',
            'pengungsi.id as idPengungsi',
            'kplklg_id',
            'telpon',
            'gender',
            'umur',
            'statPos',
            'pengungsi.posko_id as idPospeng',
            'statKon',
            'pengungsi.created_at as tglMasuk',
            'p.id as idPosko',
            'kpl.id as idKepala',
            'kpl.nama as namaKepala'
        )
            ->leftJoin('posko AS p', 'pengungsi.posko_id', '=', 'p.id')
            ->leftJoin('kepala_keluarga as kpl','pengungsi.kplklg_id','=','kpl.id')
            ->where('pengungsi.posko_id', $id)
            ->orderBy('pengungsi.created_at', 'desc')
            ->paginate(5);

        return view('admin.pengungsi.index', ['data' => $pengungsi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // show filter keluarga
    public function showKeluarga()
    {
        return view('admin.pengungsi.listKeluarga');
    }
    // show filter balita
    // show filter lansia
    // show filter sakit
}
