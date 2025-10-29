<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class UsersController extends Controller
{
    public function index()
    {
        $userss = users::all(); // gunakan plural
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // ganti users -> userss
            'password' => 'required|string|min:6',
        ]);

        users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'users berhasil ditambahkan');
    }

    public function edit($id)
    {
        $users = users::findOrFail($id);
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = users::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:userss,email,'.$users->id, // ganti users -> userss
            'password' => 'nullable|string|min:6',
        ]);

        $users->name = $request->name;
        $users->email = $request->email;
        if ($request->password) {
            $users->password = bcrypt($request->password);
        }
        $users->save();

        return redirect()->route('users.index')->with('success', 'users berhasil diupdate');
    }

    public function destroy($id)
    {
        $users = users::findOrFail($id);
        $users->delete();

        return redirect()->route('users.index')->with('success', 'users berhasil dihapus');
    }
}
