<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
}
