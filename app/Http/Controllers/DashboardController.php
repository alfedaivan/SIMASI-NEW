<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bencana;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getRP = User::select('*')
            ->leftJoin('model_has_roles as mr', 'users.id', '=', 'mr.model_id')
            ->leftJoin('roles AS r', 'mr.role_id', '=', 'r.id')
            ->where('r.id', '=', 1)->get();
        $getRPTotal = $getRP->count();

        $getRT = User::select('*')
            ->leftJoin('model_has_roles as mr', 'users.id', '=', 'mr.model_id')
            ->leftJoin('roles AS r', 'mr.role_id', '=', 'r.id')
            ->where('r.id', '=', 2)->get();
        $getRTTotal = $getRT->count();

        // bencana berjalan
        $getBBerjalan = Bencana::select('*')
            ->where('status', '=', 1)->get();
        $getBBTotal = $getBBerjalan->count();

        // bencana selesai
        $getBSelesai = Bencana::select('*')
            ->where('status', '=', 0)->get();
        $getBSTotal = $getBSelesai->count();

        return view('admin.dashboard.index', [
            'ttlBS' => $getBSTotal,
            'ttlBB' => $getBBTotal,
            'ttlRP' => $getRPTotal,
            'ttlRT' => $getRTTotal
        ]);
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

    function login(Request $req)
    {
        return User::where('email', $req->input('email'));
    }
}
