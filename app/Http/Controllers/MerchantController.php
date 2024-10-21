<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    public function index()
    {
        // Menampilkan pengguna dengan role 'Merchant' saja
        $users = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'Merchant');
        })->get();

        return view('merchant.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('merchant.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $data = $request->only('name', 'email', 'phone_number', 'address');

        // Mengatur merchant_id otomatis berdasarkan jumlah merchant yang ada
        $lastMerchantId = User::whereNotNull('merchant_id')->max('merchant_id');
        $data['merchant_id'] = $lastMerchantId ? $lastMerchantId + 1 : 1; // Menetapkan merchant_id baru

        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        $user->assignRole('Merchant'); // Menetapkan role 'Merchant' kepada pengguna yang baru dibuat

        return redirect()->route('merchant.index')->with('success', 'Merchant created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('merchant.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $data = $request->only('name', 'email', 'phone_number', 'address');

        // Mengatur merchant_id jika role 'Merchant' dipilih
        if ($request->has('roles') && in_array('Merchant', $request->roles)) {
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

        return redirect()->route('merchant.index')->with('success', 'Merchant updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Tambahkan pengecekan jika perlu sebelum menghapus user
        if ($user->hasRole('super_admin')) {
            return redirect()->route('merchant.index')->with('error', 'Cannot delete super admin user.');
        }

        $user->delete();
        return redirect()->route('merchant.index')->with('success', 'Merchant deleted successfully.');
    }
}
