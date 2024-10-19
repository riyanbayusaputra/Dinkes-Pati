<?php

namespace App\Http\Controllers;

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

        // Upload gambar
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/activity-galleries'), $imageName);

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
        $request->validate([
            'activity_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        // Jika gambar baru diupload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/activity-galleries'), $imageName);

            // Hapus gambar lama
            if (file_exists(public_path('images/activity-galleries/'.$activityGallery->image))) {
                unlink(public_path('images/activity-galleries/'.$activityGallery->image));
            }

            $activityGallery->image = $imageName;
        }

        $activityGallery->activity_title = $request->activity_title;
        $activityGallery->description = $request->description;
        $activityGallery->save();

        return redirect()->route('activity-galleries.index')
                         ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityGallery $activityGallery)
    {
        // Hapus gambar dari folder
        if (file_exists(public_path('images/activity-galleries/'.$activityGallery->image))) {
            unlink(public_path('images/activity-galleries/'.$activityGallery->image));
        }

        // Hapus data dari database
        $activityGallery->delete();

        return redirect()->route('activity-galleries.index')
                         ->with('success', 'Kegiatan berhasil dihapus.');
    }
}
