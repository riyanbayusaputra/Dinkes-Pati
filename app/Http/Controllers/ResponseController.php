<?php

namespace App\Http\Controllers;

use App\Models\Response;
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
        'answers' => 'required|array',
        'propinsi' => 'required|string',
        'kabupaten' => 'required|string',
        'kecamatan' => 'required|string',
        'kelurahan' => 'required|string',
        'stratakelurahan' => 'nullable|string',
        'rtrw' => 'nullable|string',
        'nourutresponden' => 'nullable|string',
        'nokuesioner' => 'nullable|string',
        'tanggal_survei' => 'nullable|date',
        'jam_mulai_wawancara' => 'nullable|date_format:H:i',
        'jam_selesai_wawancara' => 'nullable|date_format:H:i',
        'nama_wawancara' => 'nullable|string',
        'nama_supervisor' => 'nullable|string',
        'nama_koordinator_kecamatan' => 'nullable|string',
        'nama_kepala_rumah_tangga' => 'nullable|string',
        'jumlah_keluarga_rumah_tangga' => 'nullable|integer',
        'jumlah_jiwa_laki_laki' => 'nullable|integer',
        'jumlah_jiwa_perempuan' => 'nullable|integer',
        'nama_responden' => 'nullable|string',
        'hubungan_dengan_kepala_rumah_tangga' => 'nullable|string',
        'alamat_telepon' => 'nullable|string',
    ]);
   
    // Tambahkan questionnaire_id dan data wilayah saat membuat response
    $response = $questionnaire->responses()->create([
        'questionnaire_id' => $questionnaire->id,
        'respondent_email' => $data['respondent_email'],
        'propinsi' => $data['propinsi'],  // Menyimpan data propinsi
        'kabupaten' => $data['kabupaten'],  // Menyimpan data kabupaten
        'kecamatan' => $data['kecamatan'],  // Menyimpan data kecamatan
        'kelurahan' => $data['kelurahan'],  // Menyimpan data kelurahan
        'stratakelurahan' => $data['stratakelurahan'],  // Menyimpan data strata kelurahan
        'rtrw' => $data['rtrw'],  // Menyimpan data RT/RW
        'nourutresponden' => $data['nourutresponden'],  // Menyimpan data no urut responden
        'nokuesioner' => $data['nokuesioner'],  // Menyimpan data no kuesioner
        'tanggal_survei' => $data['tanggal_survei'],  // Menyimpan tanggal survei
        'jam_mulai_wawancara' => $data['jam_mulai_wawancara'],  // Menyimpan jam mulai wawancara
        'jam_selesai_wawancara' => $data['jam_selesai_wawancara'],  // Menyimpan jam selesai wawancara
        'nama_wawancara' => $data['nama_wawancara'],  // Menyimpan nama wawancara
        'nama_supervisor' => $data['nama_supervisor'],  // Menyimpan nama supervisor
        'nama_koordinator_kecamatan' => $data['nama_koordinator_kecamatan'],  // Menyimpan nama koordinator kecamatan
        'nama_kepala_rumah_tangga' => $data['nama_kepala_rumah_tangga'],  // Menyimpan nama kepala rumah tangga
        'jumlah_keluarga_rumah_tangga' => $data['jumlah_keluarga_rumah_tangga'],  // Menyimpan jumlah keluarga rumah tangga
        'jumlah_jiwa_laki_laki' => $data['jumlah_jiwa_laki_laki'],  // Menyimpan jumlah jiwa laki-laki
        'jumlah_jiwa_perempuan' => $data['jumlah_jiwa_perempuan'],  // Menyimpan jumlah jiwa perempuan
        'nama_responden' => $data['nama_responden'],  // Menyimpan nama responden
        'hubungan_dengan_kepala_rumah_tangga' => $data['hubungan_dengan_kepala_rumah_tangga'],  // Menyimpan hubungan dengan kepala rumah tangga
        'alamat_telepon' => $data['alamat_telepon'],  // Menyimpan alamat telepon
    ]);
   
    // Menyimpan jawaban dari setiap pertanyaan
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
    public function show($id)
    {
        $response = Response::with('answers.question')->findOrFail($id);
        return view('responses.show', compact('response'));
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
