<?php

// Masyarakat.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;

    // protected $table = 'tbl_masyarakat';

    protected $fillable = [
        'nama_lengkap', 'usia', 'no_telp', 'gender', 'pendidikan_terakhir', 'pekerjaan'
    ];

    // HasMany relation to FormulirResponseSaran
    public function formulirResponseSarans()
    {
        return $this->hasMany(FormulirResponseSaran::class, 'masyarakat_id', 'id');
    }
    
}