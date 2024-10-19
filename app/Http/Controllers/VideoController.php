<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua video dari database
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_url' => 'required|url',
        ]);

        // Simpan video baru
        Video::create([
            'title' => $request->title,
            'youtube_url' => $request->youtube_url,
        ]);

        return redirect()->route('videos.index')
                         ->with('success', 'Video berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_url' => 'required|url',
        ]);

        // Update data video
        $video->update([
            'title' => $request->title,
            'youtube_url' => $request->youtube_url,
        ]);

        return redirect()->route('videos.index')
                         ->with('success', 'Video berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        // Hapus video
        $video->delete();

        return redirect()->route('videos.index')
                         ->with('success', 'Video berhasil dihapus.');
    }
    public function show(Video $video)
    {
        // Ekstrak ID dari URL penuh
        $urlParts = explode('/', $video->youtube_url);
        $video->youtube_url = !empty($urlParts) ? end($urlParts) : null; // Mengubah URL menjadi ID video
    
        // Mengambil semua video untuk slider
        $videos = Video::all();
    
        return view('videos.show', compact('video', 'videos'));
    }
    
}    
