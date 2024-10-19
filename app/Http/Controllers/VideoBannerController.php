<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\VideoBanner; // Menggunakan model VideoBanner

class VideoBannerController extends Controller
{
    // Menampilkan daftar video
    public function index()
    {
        $videoBanners = VideoBanner::all(); // Ambil semua video banner
        return view('video_banners.index', compact('videoBanners')); // Ganti dengan view yang sesuai
    }

    // Menampilkan form untuk menambah video
    public function create()
    {
        return view('video_banners.create'); // Ganti dengan view yang sesuai
    }

    // Menyimpan video baru
    public function store(Request $request)
    {
        $request->validate([
            'file_name' => [
                'required',
                'file',
                'mimes:mp4,avi,mkv,mov', // Format video yang diizinkan
                // 'max:20480', // Maksimal ukuran file 20 MB
            ],
        ]);

        // Simpan file video ke public storage
        $path = $request->file('file_name')->store('videos', 'public'); 

        VideoBanner::create([
            'file_name' => $path,
        ]);

        return redirect()->route('video_banners.index')->with('success', 'Video berhasil diunggah!');
    }

    // Menampilkan form untuk mengedit video
    public function edit(VideoBanner $videoBanner)
    {
        return view('video_banners.edit', compact('videoBanner')); // Ganti dengan view yang sesuai
    }

    // Memperbarui video yang sudah ada
    public function update(Request $request, VideoBanner $videoBanner)
    {
        $request->validate([
            'file_name' => [
                'sometimes', // Field ini boleh tidak ada
                'file',
                'mimes:mp4,avi,mkv,mov', // Format video yang diizinkan
            ],
        ]);

        if ($request->hasFile('file_name')) {
            // Hapus file lama
            if ($videoBanner->file_name) {
                Storage::disk('public')->delete($videoBanner->file_name);
            }
            // Simpan file video ke public storage
            $path = $request->file('file_name')->store('videos', 'public'); 
            $videoBanner->update(['file_name' => $path]);
        }

        return redirect()->route('video_banners.index')->with('success', 'Video berhasil diperbarui!');
    }

    // Menghapus video
    public function destroy(VideoBanner $videoBanner)
    {
        // Hapus file video dari penyimpanan
        if ($videoBanner->file_name) {
            Storage::disk('public')->delete($videoBanner->file_name);
        }
        
        $videoBanner->delete();

        return redirect()->route('video_banners.index')->with('success', 'Video berhasil dihapus!');
    }
}
