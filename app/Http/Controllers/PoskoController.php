<?php

namespace App\Http\Controllers;

use App\Models\Posko;
use App\Models\User;
use App\Models\Bencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;
// use Spatie\Permission\Models\ModelHasRoles;

class PoskoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $posko = Posko::select(
            DB::raw("concat('Prov. ',provinsi,', Kota ',kota,', Kec. ',
            kecamatan,', Ds. ',kelurahan,', Daerah ',detail,' ') 
        as lokasi"),
            'posko.id as idPosko',
            'posko.nama as namaPosko',
            'provinsi',
            'kota',
            'kecamatan',
            'kelurahan',
            'detail',
            'bencana_id',
            'b.id as idBencana',
            DB::raw("concat(u.firstname,' ',u.lastname) as fullName"),'u.id as idAdmin',
            'u.created_at',
            'u.updated_at'
        )
            ->leftJoin('users AS u', 'posko.trc_id', '=', 'u.id')
            ->join('bencana as b','posko.bencana_id','=','b.id')
            ->where('posko.bencana_id',$id)
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

        return view('admin.posko.index', ['data'=>$posko],['getTrc'=>$trc]);
        // return view('admin.posko.index', [
        //     'data' => $posko,
        //     'getTrc' => $trc,
        // ]);
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
            $addPosko->bencana_id = $request->idBencana;
            $addPosko->pengungsi_id = $request->pengungsi;
            $addPosko->save();

            // $idPosko = Posko::where('bencana_id', $request->idBencana)->first()->value('id');
            // $bencana = Bencana::where('id', $request->idBencana)->first();
            // $bencana->posko_id = $idPosko;
            // $bencana->update();

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
        $posko = Posko::where('id', $id)->first();
        $request->validate([
            // Akan melakukan validasi kecuali punyanya sendiri
            'nama' => ['string', Rule::unique('posko')->ignore($id)],
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

    public function delete($id)
    {
        if (auth()->user()->hasAnyRole(['pusdalop'])) {
            $delete = Posko::destroy($id);

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
