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
        $validated = $request->validate([
            'mulai' => 'required', // Validasi untuk title
            'selesai' => 'required',
            'keterangan' => 'required',
        ]);

        // Simpan FAQ dengan title dan question
        $faq = PengumumanModel::create([
            'mulai' => $validated['mulai'], // Menyimpan title
            'selesai' => $validated['selesai'], // Menyimpan title
            'keterangan' => $validated['keterangan']
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
            'keterangan' => 'required',
        ]);

        // Simpan FAQ dengan title dan question
        PengumumanModel::where('id', $id)->update([
            'mulai' => $validated['mulai'], // Menyimpan title
            'selesai' => $validated['selesai'], // Menyimpan title
            'keterangan' => $validated['keterangan']
        ]);



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
}
