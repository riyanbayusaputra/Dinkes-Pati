<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'roles' => 'required|array', // Pastikan roles diisi
        ]);

        $data = $request->only('name', 'email', 'phone_number', 'address');

        // Cek jika salah satu role adalah Merchant
        if (in_array('Merchant', $request->roles)) {
            // Mengatur merchant_id otomatis berdasarkan jumlah merchant yang ada
            $lastMerchantId = User::whereNotNull('merchant_id')->max('merchant_id');
            $data['merchant_id'] = $lastMerchantId ? $lastMerchantId + 1 : 1; // Menetapkan merchant_id baru
        } else {
            // Jika bukan merchant, set merchant_id ke null
            $data['merchant_id'] = null;
        }

        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        $user->assignRole($request->roles); // Menetapkan role kepada pengguna yang baru dibuat

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'roles' => 'required|array', // Pastikan roles diisi
        ]);

        $user = User::findOrFail($id);
        $data = $request->only('name', 'email', 'phone_number', 'address');

        // Mengatur merchant_id berdasarkan role yang dipilih
        if (in_array('Merchant', $request->roles)) {
            // Mengatur merchant_id otomatis berdasarkan jumlah merchant yang ada
            $lastMerchantId = User::whereNotNull('merchant_id')->max('merchant_id');
            $data['merchant_id'] = $lastMerchantId ? $lastMerchantId + 1 : 1; // Menetapkan merchant_id baru
        } else {
            $data['merchant_id'] = null; // Atur ke null jika bukan merchant
        }

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->roles); // Menetapkan role kepada pengguna yang baru diperbarui

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Jika perlu, tambahkan pengecekan sebelum menghapus user
        if ($user->hasRole('super_admin')) {
            return redirect()->route('users.index')->with('error', 'Cannot delete super admin user.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
