<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    
        // Menyimpan file gambar ke folder 'banner/{tahun}/{bulan}/{hari}' dalam storage/app
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('banner/' . date('Y/m/d'));
        } else {
            $imageName = null; // Jika tidak ada gambar yang diupload
        }
        
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
            // Hapus gambar lama jika ada
            if ($banner->image) {
                Storage::delete($banner->image); // Hapus gambar lama tanpa 'public' disk
            }
    
            // Simpan gambar baru
            $imageName = $request->file('image')->store('banner/' . date('Y/m/d'));
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
        // Hapus gambar dari storage jika ada
        if ($banner->image) {
            Storage::delete($banner->image); // Hapus gambar tanpa 'public' disk
        }

        // Hapus data dari database
        $banner->delete();

        return redirect()->route('banner.index') // Mengarahkan kembali ke halaman index setelah delete
                         ->with('success', 'Banner berhasil dihapus.');
    }

    /**
     * Show the image from storage.
     */
    public function showImage($path)
    {
        // Menyusun path lengkap menuju gambar
        $fullPath = storage_path('app/' . $path);

        // Cek apakah file ada
        if (file_exists($fullPath)) {
            return response()->file($fullPath);
        }

        // Jika file tidak ditemukan
        abort(404, 'Gambar tidak ditemukan.');
    }
}
