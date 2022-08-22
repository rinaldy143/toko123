<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beli extends Model
{
    public $table = "beli";
    // use HasFactory;
    protected $fillable = [
        'namaLengkap', 'alamat', 'state', 'zip', 'upload_file', 'country'
    ];

    // public function countryLocate()
    // {
    //     return $this->belongsTo(country::class, 'id_country');
    // }
}

