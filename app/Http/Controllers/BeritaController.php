<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $x['berita'] = BeritaModel::get();
        return view('berita.index', $x);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity_title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $input = [
            'activity_title' => $request->activity_title,
            'description' => $request->description,
        ];

        if ($request->image) {
            // Upload gambar
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/berita'), $imageName);
            $input['image'] = $imageName;
        }

        // Simpan ke database
        $b = BeritaModel::updateOrCreate([
            'id' => $request->id
        ], $input);
        if ($b) {
            return Redirect::to('/berita')->with('info', 'Data berhasil tersimpan');
        }
        return Redirect::back()->with('info', 'Data gagal tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $x['x'] = BeritaModel::where('id', $id)->first();
        return view('berita.create', $x);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, BeritaModel $berita)
    {
        $berita = BeritaModel::where('id', $id)->first();
        // Hapus gambar dari folder
        if (file_exists(public_path('images/berita/' . $berita->image))) {
            unlink(public_path('images/berita/' . $berita->image));
        }

        // Hapus data dari database
        $berita->delete();
        return Redirect::to('/berita')->with('info', 'Data berhasil dihapus');
    }
}
