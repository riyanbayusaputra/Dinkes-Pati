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
        $users = User::with('roles')->whereHas('roles', function($query) {
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
            // 'roles' => 'required|array',
        ]);

        $data = $request->only('name', 'email', 'phone_number', 'address');
        
      

        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        $user->assignRole($request->roles);

        return redirect()->route('merchant.index')->with('success', 'User created successfully.');
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
            'email' => 'required|email',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'roles' => 'required|array',
        ]);

        $user = User::findOrFail($id);
        $data = $request->only('name', 'email', 'phone_number', 'address');
        
   

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect()->route('merchant.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

     

        $user->delete();
        return redirect()->route('merchant.index')->with('success', 'User deleted successfully.');
    }
}