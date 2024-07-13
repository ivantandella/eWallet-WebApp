<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $guarded = [];

    public function layanan()
    {
        return $this->belongsTo(layanan::class, 'id_layanan', 'id_layanan');
    }
}
