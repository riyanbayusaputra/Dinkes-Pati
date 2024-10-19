<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Questionnaire $questionnaire)
    {
        // Mengambil semua respons yang terkait dengan kuesioner
        $responses = $questionnaire->responses()->with('user')->get();
        
        return view('responses.index', compact('questionnaire', 'responses'));
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
    public function store(Request $request, Questionnaire $questionnaire)
    {
        $data = $request->validate([
            'respondent_email' => 'nullable|email',
            'answers' => 'required|array'
        ]);
       
        // Tambahkan questionnaire_id saat membuat response
        $response = $questionnaire->responses()->create([
            'questionnaire_id' => $questionnaire->id,  // Tambahkan ini
            'respondent_email' => $data['respondent_email']
        ]);
    
        // Debug untuk cek response berhasil dibuat
        // dd($response);
       
        foreach ($data['answers'] as $questionId => $answer) {
            if (is_array($answer)) {
                $answer = implode(', ', $answer);
            }
           
            $response->answers()->create([
                'question_id' => $questionId,
                'answer' => $answer
            ]);
        }
       
        return redirect()->route('questionnaires.thankyou', $questionnaire->id);
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
        //
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
    public function destroy(string $id)
    {
        //
    }
}
