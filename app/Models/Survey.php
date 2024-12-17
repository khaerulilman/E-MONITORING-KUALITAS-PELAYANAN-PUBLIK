<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{

    // hasMany
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function surveyChart()
    {
        $surveys = Survey::all();
        $surveyData = [];
        
        foreach ($surveys as $survey) {
            $avgRating = FormulirResponse::where('survey_id', $survey->id)->avg('rating');
            $surveyData[] = [
                'nama_survey' => $survey->nama_survey,
                'avg_rating' => $avgRating,
            ];
        }

        return view('survey-chart', compact('surveyData'));
    }

    public function getRespondentCount()
    {
        return FormulirResponseSaran::where('survey_id', $this->id)->count();
    }

}
