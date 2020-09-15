<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    public function adminIndex(Request $request)
    {
        $roles = Role::paginate(5);
        $roles->appends(['token' => $request->token]);
        return view('adminPages.manageRoles', ['roles' => $roles]);
    }

    public function adminInsert(RolesRequest $request)
    {
        Log::info($request->name . " " . "Role created");

        Role::create($request->all());
        return redirect()->back();
    }

    public function adminUpdate(RolesRequest $request, Role $role)
    {
        Log::info($role->name . " " . "Role updated");

        $role->update($request->all());
        return redirect()->back();
    }

    public function adminDelete(Role $role)
    {
        Log::info($role->name . " " . "Role deleted");

        $role->delete();
        return redirect()->back();
    }
}
