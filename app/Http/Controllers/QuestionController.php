<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Questionnaire;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.options');

        // Mengirim data kuesioner beserta pertanyaannya ke view
        return view('questions.index', compact('questionnaire'));
    }

    /**
     * Show the form for creating a new resource.
     */
   // app/Http/Controllers/QuestionController.php

    public function create(Questionnaire $questionnaire)
    {
        return view('questions.create', compact('questionnaire'));
    }
    
    public function store(Request $request, Questionnaire $questionnaire)
    {
        $data = $request->validate([
            'question_text' => 'required',
            'type' => 'required|in:multiple_choice,checkbox,text',
            'options.*' => 'required_if:type,multiple_choice,checkbox'
        ]);
        
        // Buat pertanyaan baru
        $question = $questionnaire->questions()->create([
            'question_text' => $data['question_text'],
            'type' => $data['type']
        ]);
        
        // Jika ada opsi jawaban, simpan opsinya
        if ($request->has('options') && in_array($data['type'], ['multiple_choice', 'checkbox'])) {
            foreach ($request->options as $optionText) {
                $question->options()->create(['option_text' => $optionText]);
            }
        }
        
        return redirect()->route('questionnaires.show', $questionnaire->id)
                        ->with('success', 'Pertanyaan berhasil ditambahkan');
    }
    
    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }
    
    public function update(Request $request, Question $question)
    {
        $data = $request->validate([
            'question_text' => 'required',
            'type' => 'required|in:multiple_choice,checkbox,text',
            'options.*' => 'required_if:type,multiple_choice,checkbox'
        ]);
        
        $question->update([
            'question_text' => $data['question_text'],
            'type' => $data['type']
        ]);
        
        // Update opsi jawaban
        if ($request->has('options')) {
            // Hapus opsi lama
            $question->options()->delete();
            
            // Tambah opsi baru
            foreach ($request->options as $optionText) {
                $question->options()->create(['option_text' => $optionText]);
            }
        }
        
        return redirect()->route('questionnaires.show', $question->questionnaire_id)
                        ->with('success', 'Pertanyaan berhasil diupdate');
    }
    
    public function destroy(Question $question)
    {
        $questionnaireId = $question->questionnaire_id;
        $question->delete();
        
        return redirect()->route('questionnaires.show', $questionnaireId)
                        ->with('success', 'Pertanyaan berhasil dihapus');
    }
}

