<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Answer;
use App\Models\KritikdansaranModel;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function indexkritikdansaran()
    {
        $x['faqs'] = KritikdansaranModel::get();
        return view('faqs.kritikdansaran', $x);
    }
    public function index()
    {
        $faqs = Faq::with('answers')->get();
        return view('faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('faqs.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255', // Validasi untuk title
            'question' => 'required|string|max:255',
            'answers' => 'required|array', // Pastikan ini array
            'answers.*' => 'required|string|max:255', // Pastikan tiap item adalah string
        ]);

        // Simpan FAQ dengan title dan question
        $faq = Faq::create([
            'title' => $validated['title'], // Menyimpan title
            'question' => $validated['question']
        ]);

        // Simpan jawaban menggunakan loop
        foreach ($validated['answers'] as $answer) {
            $faq->answers()->create(['answer' => $answer]);
        }

        return redirect()->route('faqs.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255', // Validasi untuk title
            'question' => 'required|string|max:255',
            'answers' => 'required|array',
            'answers.*' => 'required|string|max:255',
        ]);

        // Update FAQ
        $faq->update([
            'title' => $validated['title'], // Menyimpan title baru
            'question' => $validated['question'] // Update pertanyaan
        ]);

        // Hapus jawaban lama
        $faq->answers()->delete();

        // Simpan jawaban baru
        foreach ($validated['answers'] as $answer) {
            $faq->answers()->create(['answer' => $answer]);
        }

        return redirect()->route('faqs.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        // Hapus pertanyaan dan jawaban yang terkait
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
