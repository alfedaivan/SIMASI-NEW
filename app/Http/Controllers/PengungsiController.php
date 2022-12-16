<?php

namespace App\Http\Controllers;

use App\Models\Pengungsi;
use App\Models\Posko;
use App\Models\KepalaKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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
            DB::raw("concat('Prov. ',kpl.provinsi,', Kota ',kpl.kota,',
            Kec. ',kpl.kecamatan,', Ds. ',kpl.kelurahan,',
            Daerah ',kpl.detail,' ')
        as lokasi"),
        DB::raw("concat('Kec. ',kpl.kecamatan,', Ds. ',kpl.kelurahan,',
            Daerah ',kpl.detail,' ')
        as lokKel"),
            'pengungsi.nama',
            'pengungsi.id as idPengungsi',
            'kpl_id',
            'statKel',
            'telpon',
            'gender',
            'umur',
            'statPos',
            'pengungsi.posko_id as idPospeng',
            'statKon',
            'pengungsi.created_at as tglMasuk',
            'p.id as idPosko',
            'p.nama as namaPosko',
            'kpl.id as idKepala',
            'kpl.nama as namaKepala',
            'kpl.provinsi as provinsi',
            'kpl.kota as kota',
            'kpl.kecamatan as kecamatan',
            'kpl.kelurahan as kelurahan',
            'kpl.detail as detail',
        )
            ->leftJoin('posko AS p', 'pengungsi.posko_id', '=', 'p.id')
            ->leftJoin('kepala_keluarga as kpl', 'pengungsi.kpl_id', '=', 'kpl.id')
            ->where('pengungsi.posko_id', $id)
            ->orderBy('pengungsi.kpl_id', 'desc')
            ->distinct()
            ->paginate(5);

        $getKpl = KepalaKeluarga::all();

        $dataKpl = KepalaKeluarga::select('kepala_keluarga.id','kepala_keluarga.nama',
        DB::raw('count(p.kpl_id) as ttlAnggota'),DB::raw("concat('Prov. ',provinsi,', 
        Kota ',kota,',Kec. ',kecamatan,', Ds. ',kelurahan,',Daerah ',detail,' ') as lokasi"))
        ->join('pengungsi as p','kepala_keluarga.id','=','p.kpl_id')
        ->groupBy('kepala_keluarga.id','kepala_keluarga.nama','lokasi')
        ->distinct()
        ->paginate(5);

        $getNmPosko = Posko::select('nama')->where('id',$id)->get();

        $getTtlKpl = $getKpl->count();

        $getBalita = Pengungsi::where('umur','<',5)->get();

        $getTtlBalita = $getBalita->count();

        $getLansia = Pengungsi::where('umur','>',60)->get();

        $getTtlLansia = $getLansia->count();

        $getSakit = Pengungsi::where('statKon','>',0)->get();

        $getTtlSakit = $getLansia->count();

        return view('admin.pengungsi.index', [
            'data' => $pengungsi,
            'kpl' => $getKpl,
            'dataKpl' => $dataKpl,
            'getNama' => $getNmPosko,
            'ttlKpl' => $getTtlKpl,
            'ttlBalita' => $getTtlBalita,
            'ttlLansia' => $getTtlLansia,
            'ttlSakit' => $getTtlSakit,
        ]);
        // return view('admin.pengungsi.index',['data' => $pengungsi],['kpl'=>$getKpl],['datas' => $pengungsi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPengungsi(Request $request)
    {
        // $getDataKpl = 
        if (auth()->user()->hasAnyRole(['pusdalop'])) {
            // $request->validate([
            //     // 'namaBelakang' => ['required', 'max:50'],
            //     // 'nama' => ['string', 'unique:posko'],
            //     // 'trc_id' => ['string', 'unique:posko'],

            // ]);

            $statKel = $request->statKel;

            if ($statKel == 0) {
                KepalaKeluarga::create([
                    'nama' => $request->nama,
                    'provinsi' => $request->provinsi,
                    'kota' => $request->kota,
                    'kecamatan' => $request->kecamatan,
                    'kelurahan' => $request->kelurahan,
                    'detail' => $request->detail,
                ]);
                Pengungsi::create([
                    'nama' => $request->nama,
                    'telpon' => $request->telpon,
                    'statKel' => $request->statKel,
                    'gender' => $request->gender,
                    'umur' => $request->umur,
                    'statPos' => $request->statPos,
                    'posko_id' => $request->posko_id,
                    'statKon' => $request->statKon,
                ]);
                    // 'kplklg_id' => $request->kpl,
            } else {
                Pengungsi::create([
                    'nama' => $request->nama,
                    'telpon' => $request->telpon,
                    'statKel' => $request->statKel,
                    'kpl_id' => $request->kpl,
                    'gender' => $request->gender,
                    'umur' => $request->umur,
                    'statPos' => $request->statPos,
                    'posko_id' => $request->posko_id,
                    'statKon' => $request->statKon,
                ]);
            }
            // $peng = Pengungsi::create($request->all());
            $getIdKpl = KepalaKeluarga::select('id')->orderBy('id','desc')->value('id');
            $getIdPeng = Pengungsi::select('id')->orderBy('id','desc')->first();
            $getIdPeng->update([
                'kpl_id'   => $getIdKpl,
                //  'totalmoroso' => $Ingresos->deuda,
            ]);
        
            // return Redirect::to('admin/ingresos');
            Alert::success('Success', 'Data berhasil ditambahkan');
            return back();
        }
        return back();
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
    public function edit(Request $request, $id)
    {
        $pengungsi= Pengungsi::where('id', $id)->first();
        $kepalaKeluarga= KepalaKeluarga::where('id', $request->kpl)->first();

        if (auth()->user()->hasAnyRole(['pusdalop'])) {
            // $request->validate([
            //     // 'namaBelakang' => ['required', 'max:50'],
            //     // 'nama' => ['string', 'unique:posko'],
            //     // 'trc_id' => ['string', 'unique:posko'],

            // ]);

            $statKel = $pengungsi->statKel;

            if ($statKel == 0) {
                $pengungsi->update([
                    'nama' => $request->nama,
                    'telpon' => $request->telpon,
                    'statKel' => $request->statKel,
                    'gender' => $request->gender,
                    'umur' => $request->umur,
                    'statPos' => $request->statPos,
                    'posko_id' => $request->posko_id,
                    'statKon' => $request->statKon,
                ]);
                $kepalaKeluarga->update([
                    'nama' => $request->nama,
                    'provinsi' => $request->provinsi,
                    'kota' => $request->kota,
                    'kecamatan' => $request->kecamatan,
                    'kelurahan' => $request->kelurahan,
                    'detail' => $request->detail,
                ]);
                    // 'kplklg_id' => $request->kpl,
            } else {
                $pengungsi->update([
                    'nama' => $request->nama,
                    'telpon' => $request->telpon,
                    'statKel' => $request->statKel,
                    'kpl_id' => $request->kpl,
                    'gender' => $request->gender,
                    'umur' => $request->umur,
                    'statPos' => $request->statPos,
                    'posko_id' => $request->posko_id,
                    'statKon' => $request->statKon,
                ]);
            }
            Alert::success('Success', 'Data berhasil diubah');
            return back();
        }
        return back();
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

    public function delete($id)
    {
        if (auth()->user()->hasAnyRole(['pusdalop'])) {
            $getStatkel = Pengungsi::where('id',$id)->value('statKel');
            // $statKel = $getIdKepala->statKel;
            $getIdKepala = Pengungsi::where('id',$id)->value('kpl_id');
            $getKepala = KepalaKeluarga::where('id',$getIdKepala)->value('id');

            if($getStatkel == 0){
                $delPengungsi = Pengungsi::destroy($id);
                $delKepala = KepalaKeluarga::destroy($getKepala);
            }else{
                $delPengungsi = Pengungsi::destroy($id);
            }
           
            // check data deleted or not
            if ($delPengungsi == 1 || $delKepala == 1) {
                $success = true;
                $message = "Data berhasil dihapus";
            } else {
                $success = false;
                $message = "Data gagal dihapus";
            }

            //  return response
            return response()->json([
                'success' => $success,
                'message' => $message,
            ]);
        }
        return back();
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
