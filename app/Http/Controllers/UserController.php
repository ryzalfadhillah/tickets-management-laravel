<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::paginate(10);
        return view('user.index', [
            'users' => DB::table('users')->paginate(10)
        ]);
    }


    public function create()
    {
        return view('user.formUser');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user using the validated data
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect to the desired page after successful creation
        return redirect('/master-admin')->with('success', 'User berhasil ditambahkan');
    }

    public function show(User $user)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.formUser', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'nullable|string|min:8',
        ]);

        // Ambil user yang akan diupdate
        $updateUser = User::find($validatedData['id']);

        // Update data pengguna dengan data yang divalidasi
        $updateUser->name = $validatedData['name'];
        $updateUser->email = $validatedData['email'];

        // Periksa apakah password baru diberikan, kemudian update jika diperlukan
        if ($validatedData['password'] !== null) {
            $updateUser->password = Hash::make($validatedData['password']);
        }

        // Simpan perubahan
        if ($updateUser->save()) {
            return redirect('/master-admin')->with('success', 'User berhasil diperbarui');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui user');
        }
    }


    public function destroy($id)
    {
        $user = User::destroy($id);
        return redirect('/master-admin')->with('success', 'User berhasil dihapus');
    }
}
