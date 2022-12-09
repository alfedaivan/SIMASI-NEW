<?php

namespace App\Http\Controllers;

use App\Models\Posko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
// use Spatie\Permission\Models\ModelHasRoles;

class PoskoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posko = Posko::select(DB::raw("concat('Prov. ',provinsi,', Kota ',kota,', Kec. ',kecamatan,', Ds. ',kelurahan,', Daerah ',detail,' ') as lokasi"), 'posko.id as idPosko', 'nama', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'detail', DB::raw("concat(u.firstname,' ',u.lastname) as fullName"), 'u.created_at', 'u.updated_at')
            ->leftJoin('users AS u', 'posko.trc_id', '=', 'u.id')
            ->orderBy('u.id', 'desc')
            ->paginate(5);
        $trc = User::select(DB::raw("concat(firstname,' ',lastname) as fullName"), 'users.id as idAdmin', 'lastname')
            ->join('model_has_roles as mr', 'mr.model_id', '=', 'users.id')
            ->join('roles as r', 'r.id', '=', 'mr.role_id')
            ->where('r.id', 5)
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('posko')
                    ->whereRaw('users.id = posko.trc_id');
            })->get();
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
        if (auth()->user()->hasAnyRole(['pusdalop'])) {
            $request->validate([
                // 'trc' => ['required', 'max:50'],
                // 'namaBelakang' => ['required', 'max:50'],
                'nama' => ['string', 'unique:posko'],
                'trc_id' => ['string', 'unique:posko'],
            ]);
            $addPosko = new Posko;
            $addPosko->nama = $request->nama;
            $addPosko->provinsi = $request->provinsi;
            $addPosko->kota = $request->kota;
            $addPosko->kecamatan = $request->kecamatan;
            $addPosko->kelurahan = $request->kelurahan;
            $addPosko->detail = $request->detail;
            $addPosko->trc_id = $request->trc_id;
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
    public function edit(Request $request, $id)
    {
        $request->validate([
            // 'trc' => ['required', 'max:50'],
            // 'namaBelakang' => ['required', 'max:50'],
            'nama' => ['string', 'unique:posko'],
            'trc_id' => ['string', 'unique:posko'],
        ]);
        // $role = Role::where('id', $request->peran)->first();
        $posko = Posko::where('id', $id)->first();

        if (auth()->user()->hasAnyRole(['pusdalop'])) {
            $posko->nama = $request->nama;
            $posko->provinsi = $request->provinsi;
            $posko->kota = $request->kota;
            $posko->kecamatan = $request->kecamatan;
            $posko->kelurahan = $request->kelurahan;
            $posko->detail = $request->detail;
            $posko->trc_id = $request->trc_id;
            $posko->pengungsi_id = $request->pengungsi;
            $posko->update();
            // $member->syncRoles($role);
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
