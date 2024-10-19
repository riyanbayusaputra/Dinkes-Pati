<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;



class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all(); // Mengambil semua banner dari database
        return view('banner.index', compact('banners')); // Mengarahkan ke view admin.banners.index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banner.create'); // Mengarahkan ke view form pembuatan banner
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Upload gambar
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
    
        // Simpan ke database
        Banner::create([
            'title' => $request->title,
            'image' => $imageName,
        ]);
    
        return redirect()->route('banner.index') // Mengarahkan kembali ke halaman index setelah simpan
                         ->with('success', 'Banner berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('banner.edit', compact('banner')); // Menampilkan form edit untuk banner
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika gambar baru diupload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);

            // Hapus gambar lama
            if (file_exists(public_path('images/'.$banner->image))) {
                unlink(public_path('images/'.$banner->image));
            }

            $banner->image = $imageName;
        }

        $banner->title = $request->title;
        $banner->save();

        return redirect()->route('banner.index') // Mengarahkan kembali ke halaman index setelah update
                         ->with('success', 'Banner berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        // Hapus gambar dari folder
        if (file_exists(public_path('images/'.$banner->image))) {
            unlink(public_path('images/'.$banner->image));
        }

        // Hapus data dari database
        $banner->delete();

        return redirect()->route('banner.index') // Mengarahkan kembali ke halaman index setelah delete
                         ->with('success', 'Banner berhasil dihapus.');
    }
}
