<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\FormulirResponse;
use App\Models\FormulirResponseSaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Feedback;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $users = DB::table('tbl_user_admin')->get();
        $surveys = Survey::all(); //get all data surveys table
        $questions = Question::all(); //get all data question table
        $surveysarans = FormulirResponseSaran::with('masyarakat', 'survey')->get();
        $surveyresponses = FormulirResponse::with('question')->get();

        $surveyData = [];
        
        foreach ($surveys as $survey) {
            $avgRating = FormulirResponse::where('survey_id', $survey->id)->avg('rating');
            $respondentCount = $survey->getRespondentCount();
            
            $maleCount = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('gender', 'male');
                })
                ->count();
                
            $femaleCount = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('gender', 'female');
                })
                ->count();

            $ageGroups = [
                '15-20' => 0,
                '20-30' => 0,
                '30-40' => 0,
                '40-50' => 0,
                '60-90' => 0,
            ];

            $ageGroups['15-20'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->whereBetween('usia', [15, 20]);
                })
                ->count();

            $ageGroups['20-30'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->whereBetween('usia', [20, 30]);
                })
                ->count();

            $ageGroups['30-40'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->whereBetween('usia', [30, 40]);
                })
                ->count();

            $ageGroups['40-50'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->whereBetween('usia', [40, 50]);
                })
                ->count();

            $ageGroups['60-90'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->whereBetween('usia', [60, 90]);
                })
                ->count();

            $educationLevels = [
                'SD' => 0,
                'SMP' => 0,
                'SMA' => 0,
                'Sarjana' => 0,
                'Magister' => 0,
                'Doktor/Profesor' => 0,
            ];

            $educationLevels['SD'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('pendidikan_terakhir', 'SD');
                })
                ->count();

            $educationLevels['SMP'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('pendidikan_terakhir', 'SMP');
                })
                ->count();

            $educationLevels['SMA'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('pendidikan_terakhir', 'SMA');
                })
                ->count();

            $educationLevels['Sarjana'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('pendidikan_terakhir', 'Sarjana');
                })
                ->count();

            $educationLevels['Magister'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('pendidikan_terakhir', 'Magister');
                })
                ->count();

            $educationLevels['Doktor/Profesor'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('pendidikan_terakhir', 'Doktor/Profesor');
                })
                ->count();




             // Logika untuk menghitung jumlah responden dalam setiap tingkat pendidikan terakhir

             $occupationCounts = [
                'Pelajar' => 0,
                'Aparat Keamanan' => 0,
                'Wiraswasta' => 0,
                'Karyawan' => 0,
                'PNS' => 0,
            ];

            $occupationCounts['Pelajar'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('pekerjaan', 'Pelajar');
                })
                ->count();

            $occupationCounts['Aparat Keamanan'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('pekerjaan', 'Aparat Keamanan');
                })
                ->count();

            $occupationCounts['Wiraswasta'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('pekerjaan', 'Wiraswasta');
                })
                ->count();

            $occupationCounts['Karyawan'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('pekerjaan', 'Karyawan');
                })
                ->count();

            $occupationCounts['PNS'] = FormulirResponseSaran::where('survey_id', $survey->id)
                ->whereHas('masyarakat', function ($query) {
                    $query->where('pekerjaan', 'PNS');
                })
                ->count();

            $surveyData[] = [
                'nama_survey' => $survey->nama_survey,
                'avg_rating' => $avgRating,
                'respondent_count' => $respondentCount,
                'male_count' => $maleCount,
                'female_count' => $femaleCount,
                'age_groups' => $ageGroups,
                'education_levels' => $educationLevels,
                'occupation_counts' => $occupationCounts,
            ];
        }

        // Ubah objek Survey menjadi array
        $surveysArray = $surveys->toArray();

        // Mengambil nama_survey dari array surveys
        $labels = array_column($surveysArray, 'nama_survey');

        // Mengambil avg_rating dari array surveyData
        $data = array_column($surveyData, 'avg_rating');

        return view('dashboard.index', compact('labels', 'data', 'questions', 'surveys', 'surveysarans', 'surveyresponses', 'users', 'surveyData'));
    }


    public function update_profile(Request $request)
    {
        $user = Auth::user(); // Mengambil data user yang sedang login
    
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:tbl_user_admin,email,' . $user->id,
            'password' => 'nullable|string|min:5|confirmed',
            'no_telp' => 'nullable|string|max:20',
            'alamat_rumah' => 'nullable|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Tambahkan validasi khusus untuk password yang harus sesuai dengan konfirmasi password
        if (!empty($validatedData['password']) && $validatedData['password'] !== $request->input('password_confirmation')) {
            return redirect()->back()->withInput()->withErrors(['password_confirmation' => 'Password tidak sesuai dengan konfirmasi password']);
        }
    
        // Handle foto_profil upload jika disediakan
        if ($request->hasFile('foto_profil')) {
            // Upload foto profil
            $file = $request->file('foto_profil');
            if ($file->isValid()) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/foto_profile'), $filename);
    
                // Hapus foto_profil lama jika ada
                if ($user->foto_profil) {
                    $oldImagePath = public_path('images/foto_profile/' . $user->foto_profil);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
    
                // Simpan nama file foto_profil baru
                $user->foto_profil = $filename;
            }
        }
    
        // Mengupdate data profil user
        $user->email = $validatedData['email'];
    
        // Update no_telp jika disediakan
        if (!empty($validatedData['no_telp'])) {
            $user->no_telp = $validatedData['no_telp'];
        }
    
    
        // Update password jika disediakan dan valid
        if (!empty($validatedData['password'])) {
            $user->password = $validatedData['password'];
        }
    
        // Update alamat_rumah jika disediakan
        if (!empty($validatedData['alamat_rumah'])) {
            $user->alamat_rumah = $validatedData['alamat_rumah'];
        }
    
        $user->save();
    
        // Mengembalikan respons berhasil
        return redirect()->route('dashboard.index')->with('success', 'Profil berhasil diperbarui');
    }
    

    public function manage_survey(Request $request)
    {
        $deskripsi = $request->input('deskripsi');
        $nama_survey = $request->input('nama_survey');
        $user_admin_id = Auth::id();

        $survey = new Survey;
        $survey->nama_survey = $nama_survey;
        $survey->deskripsi = $deskripsi;
        $survey->user_admin_id = $user_admin_id;
        $survey->save();

        $pertanyaan = $request->input('pertanyaan');
        if(is_array($pertanyaan)) {
            foreach ($pertanyaan as $key => $value) {
                $question = new Question;
                $question->survey_id = $survey->id; // Use the id of the saved survey
                $question->nama_question = $value;
                $question->save();
            }
        }

        return redirect()->back()->with('success', 'Survey berhasil disimpan');
    }


    
    public function edit_survey(Request $request, $id)
    {
        // Retrieve the existing survey and questions
        $survey = Survey::findOrFail($id);
        $questions = Question::where('survey_id', $id)->get();

        // Validate incoming request data
        $validatedData = $request->validate([
            'nama_survey' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'questions' => 'nullable|array',
            'questions.*' => 'nullable|string|max:255',
        ]);

        // Update survey details
        $survey->nama_survey = $validatedData['nama_survey'];
        $survey->deskripsi = $validatedData['deskripsi'];
        $survey->save();

        // Update existing questions
        if (isset($validatedData['questions'])) {
            foreach ($validatedData['questions'] as $key => $value) {
                $question = Question::findOrFail($key);
                $question->nama_question = $value;
                $question->save();
            }
        }

        return redirect()->route('dashboard.index')->with('success', 'Survey berhasil diperbarui');
    }

    public function delete_survey($id)
    {
        $survey = Survey::findOrFail($id);
        // Delete related questions first
        Question::where('survey_id', $id)->delete();
        // Then delete the survey
        $survey->delete();

        return redirect()->route('dashboard.index')->with('success', 'Survey berhasil dihapus');
    }

    public function delete_formulir_response($id, $masyarakat_id, $survey_id)
    {
        // Delete FormulirResponse by masyarakat_id and survey_id
        FormulirResponse::where('masyarakat_id', $masyarakat_id)
                        ->where('survey_id', $survey_id)
                        ->delete();

        // Delete FormulirResponseSaran by id
        $feedbackResponseSarans = FormulirResponseSaran::where('id', $id)->get();
        foreach ($feedbackResponseSarans as $responseSaran) {
            $responseSaran->delete();
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Feedback berhasil dihapus');
    }

    
    
    


    public function create_feedback(Request $request)
    {
        $request->validate([
            'survey_id' => 'required|integer',
            'user_admin_id' => 'required|integer',
            'feedback' => 'required|string',
        ]);

        Feedback::create([
            'survey_response_saran_id' => $request->survey_id,
            'user_admin_id' => $request->user_admin_id,
            'feedback' => $request->feedback,
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }


}
