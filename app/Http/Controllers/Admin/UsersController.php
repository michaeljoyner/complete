<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegisterFormRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with(compact('users'));
    }

    public function register(RegisterFormRequest $request)
    {
        User::create($request->all());

        return redirect('admin/users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit')->with(compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id)->update($request->only(['name', 'email']));

        return redirect('admin/users');
    }

    public function delete($id)
    {
        if(User::count() < 2) {
            return redirect('admin/users');
        }
        User::findOrFail($id)->delete();

        return redirect('/admin/users');
    }
}
