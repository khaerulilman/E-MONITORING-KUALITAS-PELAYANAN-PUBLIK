<?php

// SurveyResponseSaran.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirResponseSaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id', 'masyarakat_id', 'saran'
    ];

    // belongsTO

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id', 'id');
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }

}