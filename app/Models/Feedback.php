<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks'; 

    protected $fillable = [
        'survey_response_saran_id',
        'user_admin_id',
        'feedback',
    ];

    public function formulirResponseSaran()
    {
        return $this->belongsTo(FormulirResponseSaran::class, 'survey_response_saran_id', 'id');
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id','id');
    }
}

