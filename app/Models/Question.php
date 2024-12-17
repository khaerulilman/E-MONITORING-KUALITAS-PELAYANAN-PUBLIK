<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // belongsTo
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

}
