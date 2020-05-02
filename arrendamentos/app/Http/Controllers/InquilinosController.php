<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Inquilinos;
use App\Http\Controllers\Traits\Authorizable;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Auth\Events\Registered;
use App\DataTables\UserDataTable;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class InquilinosController extends Controller
{
    public function show($name)
    {
        $inquilinos = DB::table('inquilinos')->where('name', $name)->first();

        return view('inquilinos.index', ['inquilinos' => $inquilinos]);
    }
}
