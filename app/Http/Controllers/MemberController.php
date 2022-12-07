<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class MemberController extends Controller
{
    public function index()
    {
        $users = User::select(DB::raw("concat(users.firstname,' ',users.lastname) as fullName"), 'users.firstname', 'users.lastname', 'users.email', 'users.id AS idAdmin', 'mr.role_id', 'r.id as idRole', 'r.name as namaPeran')
        // ->leftJoin('posko AS p', 'users.posko_id','=','p.id')
            ->leftJoin('model_has_roles as mr', 'users.id', '=', 'mr.model_id')
            ->leftJoin('roles AS r', 'mr.role_id', '=', 'r.id')
            ->paginate(5);
        // 'posko' => Posko::select('posko.namaPosko')->paginate(5);
        $roles = Role::all();
        // 'getRoles' => Role::select('roles.name')->paginate(5);
        // return view('admin.member.index');
        return view('admin.member.index', [
            'data' => $users,
            'role' => $roles,
        ]);
    }

    public function createMember(Request $request)
    {
        if (auth()->user()->hasAnyRole(['pusdalop', 'trc'])) {
            $request->validate([
                'namaDepan' => ['required', 'max:50'],
                'namaBelakang' => ['required', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            ]);

            $addMember = new User;
            $role = Role::findOrFail($request->peran);
            $addMember->firstname = $request->namaDepan;
            $addMember->lastname = $request->namaBelakang;
            $addMember->email = $request->email;
            $addMember->email_verified_at = now();
            $addMember->password = Hash::make('password');
            $addMember->remember_token = Str::random(10);
            $addMember->save();
            $addMember->assignRole($role);
            Alert::success('Success', 'Member berhasil ditambahkan');
            return back();
        }
        return back();
    }

    public function edit(Request $request, $id)
    {
        // $request->validate([
        //     'namaDepan' => ['required', 'max:50'],
        //     'namaBelakang' => ['required', 'max:50'],
        //     'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
        // ]);

        $role = Role::where('id', $request->peran)->first();
        $member = User::where('id', $id)->first();

        if (auth()->user()->hasAnyRole(['pusdalop', 'trc'])) {
            $member->firstname = $request->namaDepan;
            $member->lastname = $request->namaBelakang;
            $member->email = $request->email;
            $member->update();
            $member->syncRoles($role);
            Alert::success('Success', 'Member berhasil diubah');
            return redirect()->back();
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        //
    }
}