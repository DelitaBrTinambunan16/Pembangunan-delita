<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth'); // hanya untuk user login
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
            'role'=>'required|in:admin,petugas,viewer'
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('users.index')->with('success', 'User berhasil dibuat.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'role'=>'required|in:admin,petugas,viewer'
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'min:6|confirmed';
        }

        $data = $request->validate($rules);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // opsi: jangan hapus diri sendiri
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')->with('error', 'Tidak bisa menghapus akun yang sedang login.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
