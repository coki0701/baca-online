<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //dd(auth()->user()->role);

         $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    //Edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    //Update
     public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'role' => 'required|in:user,admin'
        ]);

        $user->update([
            'role' => $request->role
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Role berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // mencegah menghapus akun admin
        if ($user->id == auth()->id()) {
            return back()->with('error', 'Tidak bisa hapus akun sendiri');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus');
    }
}