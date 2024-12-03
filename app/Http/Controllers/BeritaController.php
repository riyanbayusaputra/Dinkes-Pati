<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar opsional
            'description' => 'nullable|string',
        ]);

        $input = [
            'activity_title' => $request->activity_title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('berita/' . date('Y/m/d'));
            $input['image'] = $imageName; // Simpan path ke dalam array input
        } else {
            $input['image'] = null; // Set null jika tidak ada gambar
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
    public function show($id)
    {
        // Fetch the specific berita by ID
        $berita = BeritaModel::findOrFail($id);

        // Return the 'show' view with the berita data
        return view('detail.berita', compact('berita'));
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
       
            // Hapus gambar dari storage jika ada
            if ($berita->image) {
                Storage::disk('public')->delete($berita->image);
            }
        // Hapus data dari database
        $berita->delete();
        return Redirect::to('/berita')->with('info', 'Data berhasil dihapus');
    }
    public function showberita($path)
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
