<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\Posko;
use App\Models\Pengungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bencana = Bencana::select(DB::raw("concat(tanggal,' ',waktu) as waktu"), 
        'tanggal as tgl', 'waktu as time', 'bencana.id as idBencana', 
        'bencana.nama as namaBencana', 'lokasi', 'status',  
        'bencana.updated_at as waktuUpdate', 'p.bencana_id',
        DB::raw('count(p.bencana_id) as ttlPosko'), DB::raw('count(peng.posko_id) as ttlPengungsi')
      )
            ->leftJoin('posko AS p', 'bencana.id', '=', 'p.bencana_id')
            ->leftJoin('pengungsi as peng','p.id','=','peng.posko_id')
            ->orderBy('bencana.tanggal', 'desc')
            ->distinct()
            ->groupBy('p.bencana_id', 'bencana.tanggal', 'bencana.waktu', 'bencana.id','bencana.nama','lokasi','status','bencana.updated_at')
            ->paginate(5);

        // $getTtlPengungsi = Pengungsi::select(DB::raw("count('posko_id') as ttlPengungsi"))
        // ->join('posko as p','pengungsi.posko_id','=','p.id')
        // ->join('bencana as b','p.bencana_id','=','b.id')
        // ->paginate(5);

        return view('admin.bencana.index', ['data'=>$bencana]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBencana(Request $request)
    {
        if (auth()->user()->hasAnyRole(['pusdalop'])) {
            // $request->validate([
            //     'namaDepan' => ['required', 'max:50'],
            //     'namaBelakang' => ['required', 'max:50'],
            //     'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            // ]);
            $addBencana = new Bencana;
            // $role = Role::findOrFail($request->peran);
            $addBencana->nama = $request->namaBencana;
            $addBencana->tanggal = $request->tanggal;
            $addBencana->waktu = $request->waktu;
            $addBencana->lokasi = $request->lokasi;
            $addBencana->status = $request->status;
            $addBencana->save();
            // $addMember->assignRole($role);
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
        $bencana = Bencana::where('id', $id)->first();

        if (auth()->user()->hasAnyRole(['pusdalop'])) {
            $bencana->nama = $request->namaBencana;
            $bencana->tanggal = $request->tanggal;
            $bencana->waktu = $request->waktu;
            $bencana->lokasi = $request->lokasi;
            $bencana->status = $request->status;
            $bencana->update();
            Alert::success('Success', 'Data berhasil diubah');
            return redirect()->back();
        }
        return redirect()->back();
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
            $getPosko = Posko::where('bencana_id',$id)->value('id');
            $delBencana = Bencana::destroy($id);
            $delPosko = Posko::destroy($getPosko);
            
            // check data deleted or not
            if ($delBencana == 1 && $delPosko == 1) {
                $success = true;
                $message = "Data berhasil dihapus";
            } else if($delBencana == 1){
                $success = true;
                $message = "Data berhasil dihapus";
            } else{
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
}