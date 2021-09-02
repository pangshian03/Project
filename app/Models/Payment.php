<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=['id', 'icNo', 'amount', 'note'];

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
}
