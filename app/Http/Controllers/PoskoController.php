<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Posko;
use App\Models\User;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class PoskoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posko = Posko::select(DB::raw("concat('Prov. ',provinsi,', Kota ',kota,', Kec. ',kecamatan,', Ds. ',kelurahan,', Daerah ',detail,' ') as lokasi"),'posko.id as idPosko','nama', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'detail', 'u.firstname', 'u.created_at', 'u.updated_at')
             ->leftJoin('users AS u', 'posko.trc_id','=','u.id')
            // ->leftJoin('model_has_roles as mr', 'users.id', '=', 'mr.model_id')
            // ->leftJoin('roles AS r', 'mr.role_id', '=', 'r.id')
            ->orderBy('u.id', 'desc')
            ->paginate(5);
        // $trc = Role::where('name','trc');
        $trc = User::select(DB::raw("concat(users.firstname,' ',users.lastname) as fullName"),'users.id as idAdmin','users.lastname', 'r.id as idRole', 'mr.role_id')
        ->leftJoin('model_has_roles as mr', 'users.id', '=', 'mr.model_id')
        ->leftJoin('roles AS r', 'mr.role_id', '=', 'r.id')
        ->where('r.name', 'trc')
        ->paginate(5);
        return view('admin.posko.index', [
            'data' => $posko,
            'getTrc' => $trc,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPosko(Request $request)
    {
        if (auth()->user()->hasAnyRole(['pusdalop', 'trc'])) {
            $addPosko = new Posko;
            $addPosko->nama = $request->namaPosko;
            $addPosko->provinsi = $request->provinsi;
            $addPosko->kota = $request->kota;
            $addPosko->kecamatan = $request->kecamatan;
            $addPosko->kelurahan = $request->kelurahan;
            $addPosko->detail = $request->detail;
            $addPosko->trc_id = $request->trc;
            $addPosko->pengungsi_id = $request->pengungsi;
            $addPosko->save(); 
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
}
