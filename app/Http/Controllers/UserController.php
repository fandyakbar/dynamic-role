<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    public function index()
    {
        //
        $user = User::paginate(10);
        return view('users.index', compact('user'));
    }

    public function managePermission($id)
    {
        $user = User::find($id);
        $permissions = Permission::all();

        return view('users.edit', compact(['user', 'permissions']));
    }


    public function updatePermission($id, Request $request)
    {
        $user = User::find($id);

        try {
            $user->syncPermissions($request->permissions, []);
            return redirect('/home')->with('message', 'Permission Updated Successfully');/*  */
        } catch (\Exception $e) {
            //throw $th;
            return redirect('/home')->with('message', 'Permission Not Updated ');/*  */
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
