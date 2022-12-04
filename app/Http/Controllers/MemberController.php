<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $users = User::select(DB::raw("concat(users.firstname,' ',users.lastname) as fullName"), 'users.email','users.id AS idAdmin', 'mr.role_id', 'r.name as namaPeran')
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

    public function createMember(Request $request){
        // $this->validate($request, [
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'email',
        //     'password' => 'min:6|required_with:password_confirmation|same:password_confirm',
        //     'password_confirm' => 'min:6'
        //     ]);
        // $request->validated();
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
}
