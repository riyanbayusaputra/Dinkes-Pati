<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index() {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }

    public function create() {
        return view('documents.create');
    }

    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'penyusun' => 'required|string|max:255', // Tambahkan validasi penyusun
            'tahun' => 'required|digits:4|integer|min:1900|max:' . date('Y'), // Validasi tahun
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf,doc,docx|max:2048', // PDF atau file Word
        ]);

        // Simpan file ke folder storage
        $filePath = $request->file('file')->store('documents/' . date('Y/m/d'), 'public');

        // Simpan informasi dokumen ke database
        Document::create([
            'title' => $request->title,
            'penyusun' => $request->penyusun, // Tambahkan penyusun
            'tahun' => $request->tahun,       // Tambahkan tahun
            'description' => $request->description,
            'file' => $filePath,
        ]);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diupload.');
    }

    public function show($id) {
        $document = Document::findOrFail($id);
        return view('documents.show', compact('document'));
    }

    public function edit($id) {
        $document = Document::findOrFail($id);
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, $id) {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'penyusun' => 'required|string|max:255', // Tambahkan validasi penyusun
            'tahun' => 'required|digits:4|integer|min:1900|max:' . date('Y'), // Validasi tahun
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048', // PDF atau file Word
        ]);

        $document = Document::findOrFail($id);
        $document->title = $request->title;
        $document->penyusun = $request->penyusun; // Tambahkan penyusun
        $document->tahun = $request->tahun;       // Tambahkan tahun
        $document->description = $request->description;

        // Cek jika file diupload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($document->file) {
                $oldFilePath = storage_path('app/public/' . $document->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Simpan file baru
            $filePath = $request->file('file')->store('documents/' . date('Y/m/d'), 'public');
            $document->file = $filePath;
        }

        $document->save();

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy($id) {
        $document = Document::findOrFail($id);

        // Hapus file dari storage
        if ($document->file) {
            $filePath = storage_path('app/public/' . $document->file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Hapus dari database
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}