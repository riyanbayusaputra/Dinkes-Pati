<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityGallery;
use Illuminate\Http\Request;

class ActivityGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activityGalleries = ActivityGallery::all(); // Mengambil semua galeri kegiatan
        return view('activity-galleries.index', compact('activityGalleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activity-galleries.create'); // Menampilkan form create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity_title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('activity-galleries/' . date('Y/m/d'));
        } else {
            $imageName = null; // Pastikan image tidak kosong
        }



        // Simpan ke database
        ActivityGallery::create([
            'activity_title' => $request->activity_title,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        return redirect()->route('activity-galleries.index')
                         ->with('success', 'Kegiatan berhasil ditambahkan ke galeri.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityGallery $activityGallery)
    {
        return view('activity-galleries.show', compact('activityGallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityGallery $activityGallery)
    {
        return view('activity-galleries.edit', compact('activityGallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivityGallery $activityGallery)
    {
        // Validasi input
        $validated = $request->validate([
            'activity_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);
    
        // Jika gambar baru diupload
       // Proses upload gambar baru jika ada
       if ($request->hasFile('image')) {
        if ($activityGallery->image) {
            Storage::delete($activityGallery->image); // Hapus gambar lama
        }
        $activityGallery->image = $request->file('image')->store('activity-galleries/' . date('Y/m/d'));
    }
        // Perbarui data lainnya
        $activityGallery->activity_title = $validated['activity_title'];
        $activityGallery->description = $validated['description'];
        $activityGallery->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('activity-galleries.index')
                         ->with('success', 'Kegiatan berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityGallery $activityGallery)
    {
     
       // Hapus gambar dari storage jika ada
       if ($activityGallery->image) {
        Storage::delete($activityGallery->image);
    }

    // Hapus data dari database
    $activityGallery->delete();



        return redirect()->route('activity-galleries.index')
                         ->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function showGallery($path)
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
