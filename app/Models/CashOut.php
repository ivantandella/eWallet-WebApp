<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashOut extends Model
{
    use HasFactory;

    protected $table = 'cash_out';
    protected $guarded = [];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank', 'id_bank');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
