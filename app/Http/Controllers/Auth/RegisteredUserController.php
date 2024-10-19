<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input termasuk phone_number dan address
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'string', 'max:15'], // Validasi nomor telepon
            'address' => ['required', 'string', 'max:255'], // Validasi alamat
            'account_type' => ['required', 'string', 'max:255'],
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number, // Menyimpan nomor telepon
            'address' => $request->address, // Menyimpan alamat
            
        ]);
        if($request->account_type == 'Merchant'){
            $user->assignRole('Merchant');
        }
        else if($request->account_type == 'Pegawai') {
            $user->assignRole('pegawai');
        }
        else {
            $user->assignRole('pegawai');
        }

        // Event registrasi
        event(new Registered($user));

        // Login setelah registrasi
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
