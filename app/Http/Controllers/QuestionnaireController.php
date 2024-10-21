<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
    $user = Auth::user();

    // Ambil semua kuis tanpa memfilter berdasarkan user_id, sehingga semua role dapat melihatnya
    $questionnaires = Questionnaire::all();

        // Kirim data ke view
        return view('questionnaires.index', compact('questionnaires'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        return view('questionnaires.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);
        $data['user_id'] = Auth::user()->id;

        $questionnaire = Questionnaire::create($data);

        return redirect('/questionnaires/' . $questionnaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.options', 'responses.answers');
        return view('questionnaires.show', compact('questionnaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Menampilkan form edit
    public function edit(Questionnaire $questionnaire)
    {
        return view('questionnaires.edit', compact('questionnaire'));
    }

    // Memproses update kuesioner
    public function update(Request $request, Questionnaire $questionnaire)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable'
        ]);

        $questionnaire->update($validatedData);

        return redirect()
            ->route('questionnaires.index')
            ->with('success', 'Kuesioner berhasil diperbarui!');
    }

    // Menghapus kuesioner
    public function destroy(Questionnaire $questionnaire)
    {
        try {
            $questionnaire->delete();
            return redirect()
                ->route('questionnaires.index')
                ->with('success', 'Kuesioner berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()
                ->route('questionnaires.index')
                ->with('error', 'Gagal menghapus kuesioner!');
        }
    }
    public function thankyou(Questionnaire $questionnaire)
    {
        return view('questionnaires.thankyou', compact('questionnaire'));
    }
    public function responses(Request $request, Questionnaire $questionnaire)
    {
        $query = $questionnaire->responses()->with(['answers.question']);

        // Search functionality
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('respondent_email', 'LIKE', "%{$search}%")
                ->orWhereHas('answers', function ($q) use ($search) {
                    $q->where('answer', 'LIKE', "%{$search}%");
                });
        }

        $responses = $query->latest()->paginate(10);
        // return $responses;
        return view('questionnaires.responses', compact('questionnaire', 'responses'));
    }
    public function showResponses($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);
        $responses = $questionnaire->responses()
            ->when(request('search'), function($query) {
                $query->where('respondent_email', 'like', '%'.request('search').'%');
            })
            ->paginate(10);
        
        // Data untuk navigasi
        $nextQuestionnaire = Questionnaire::where('id', '>', $id)->orderBy('id')->first();
        $prevQuestionnaire = Questionnaire::where('id', '<', $id)->orderBy('id', 'desc')->first();
        
        return view('questionnaires.responses', compact(
            'questionnaire', 
            'responses', 
            'nextQuestionnaire', 
            'prevQuestionnaire'
        ));
    }

}