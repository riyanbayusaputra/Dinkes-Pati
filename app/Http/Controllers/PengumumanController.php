<?php

namespace App\Http\Controllers;

use App\Models\PengumumanModel;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = PengumumanModel::get();
        return view('pengumuman.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'mulai' => 'required', // Validasi untuk title
            'selesai' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',
            'image' => 'mimes:jpeg,jpg,png|required',
            'pdf' => 'mimes:pdf|required',
        ]);

        $image = null; // Set null jika tidak ada gambar
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('pengumuman/' . date('Y/m/d'));
            $image = $imageName; // Simpan path ke dalam array input
        }
        $pdf = null; // Set null jika tidak ada gambar
        if ($request->hasFile('pdf')) {
            $pdfName = $request->file('pdf')->store('pengumuman/' . date('Y/m/d'));
            $pdf = $pdfName; // Simpan path ke dalam array input
        }

        // Simpan FAQ dengan title dan question
        $faq = PengumumanModel::create([
            'mulai' => $validated['mulai'], // Menyimpan title
            'selesai' => $validated['selesai'], // Menyimpan title
            'keterangan' => $validated['keterangan'],
            'judul' => $validated['judul'],
            'image' => $image,
            'pdf' => $pdf
        ]);



        return redirect()->route('datapengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
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
        $faq = PengumumanModel::where('id', $id)->first();
        return view('pengumuman.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $id;
        $validated = $request->validate([
            'mulai' => 'required', // Validasi untuk title
            'selesai' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'pdf' => 'nullable|mimes:pdf',
        ]);

        $i = [
            'mulai' => $validated['mulai'], // Menyimpan title
            'selesai' => $validated['selesai'], // Menyimpan title
            'judul' => $validated['judul'],
            'keterangan' => $validated['keterangan'],
        ];

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('pengumuman/' . date('Y/m/d'));
            $i['image'] = $imageName; // Simpan path ke dalam array input
        }
        if ($request->hasFile('pdf')) {
            $pdfName = $request->file('pdf')->store('pengumuman/' . date('Y/m/d'));
            $i['pdf'] = $pdfName; // Simpan path ke dalam array input
        }

        // Simpan FAQ dengan title dan question
        PengumumanModel::where('id', $id)->update($i);



        return redirect()->route('datapengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PengumumanModel::where('id', $id)->delete();
        return redirect()->route('datapengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }

    public function showpengumuman($path)
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
