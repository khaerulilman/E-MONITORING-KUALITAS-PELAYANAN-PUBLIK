<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Question;
use App\Models\Masyarakat;
use App\Models\FormulirResponse;
use App\Models\FormulirResponseSaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormulirController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        return view('formulir.index', compact('surveys'));
    }

    public function fill_out_survey(Request $request)
    {
    // Validasi data yang diterima dari form
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'phone' => 'required|string|max:15',
        'gender' => 'required|string|in:male,female',
        'education' => 'required|string|max:255',
        'job' => 'required|string|max:255',
        'responsibility' => 'accepted',
        'ratings' => 'array',
        'saran' => 'array',
    ]);

    // Simpan data ke tabel 'tbl_masyarakat'
    $masyarakat = Masyarakat::create([
        'nama_lengkap' => $validatedData['name'],
        'usia' => $validatedData['age'],
        'no_telp' => $validatedData['phone'],
        'gender' => $validatedData['gender'],
        'pendidikan_terakhir' => $validatedData['education'],
        'pekerjaan' => $validatedData['job'],
    ]);

    // Simpan data rating ke tabel 'tbl_survey_response' dan saran ke tabel 'tbl_survey_response_saran' jika ada
    if (isset($validatedData['ratings'])) {
        foreach ($validatedData['ratings'] as $surveyId => $questions) {
            foreach ($questions as $questionId => $rating) {
                FormulirResponse::create([
                    'survey_id' => $surveyId,
                    'question_id' => $questionId,
                    'masyarakat_id' => $masyarakat->id,
                    'rating' => $rating,
                ]);
            }

            // Simpan data saran ke tabel 'tbl_survey_response_saran' jika ada
            $saran = $validatedData['saran'][$surveyId] ?? 'kosong';
            FormulirResponseSaran::create([
                'survey_id' => $surveyId,
                'masyarakat_id' => $masyarakat->id,
                'saran' => $saran,
            ]);
        }
    }

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }


}
