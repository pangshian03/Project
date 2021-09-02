<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;
    protected $fillable=['id', 'icNo'];

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
}
