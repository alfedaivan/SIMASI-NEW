<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\Posko;
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
        $bencana = Bencana::select(DB::raw("concat(tanggal,' ',waktu) as waktu"), 'tanggal as tgl', 'waktu as time', 'bencana.id as idBencana', 'bencana.nama as namaBencana', 'lokasi', 'status',  'bencana.pengungsi_id as pengungsi', 'bencana.updated_at as waktuUpdate', 'p.bencana_id as poskoCana')
            ->leftJoin('posko AS p', 'bencana.id', '=', 'p.bencana_id')
            ->orderBy('bencana.tanggal', 'desc')
            ->distinct()
            ->paginate(5);

        $getPosko = Posko::select('posko.id as idPosko', 'posko.bencana_id')
        ->join('bencana as b','posko.bencana_id','=','b.id')
        ->get();
        $countPosko = $getPosko->count();

        return view('admin.bencana.index', ['data'=>$bencana],['ttlPosko'=>$countPosko]);
        
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
            $delete = Bencana::destroy($id);

            // check data deleted or not
            if ($delete == 1) {
                $success = true;
                $message = "Data berhasil dihapus";
            } else {
                $success = true;
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
