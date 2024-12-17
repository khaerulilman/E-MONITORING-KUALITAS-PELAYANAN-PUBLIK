<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id', 'question_id', 'masyarakat_id', 'rating'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
    
}