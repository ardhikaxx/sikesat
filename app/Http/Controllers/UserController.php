<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('user.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'nip' => 'nullable|string|max:50',
            'roles' => 'array'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'is_active' => $request->has('is_active'),
        ]);

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        } else {
            $user->syncRoles([]);
        }

        return redirect()->route('user.index')->with('sukses', 'Pengguna berhasil diperbarui');
    }
}
