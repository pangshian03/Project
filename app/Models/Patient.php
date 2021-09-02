<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $primaryKey='icNo';
    protected $fillable=['icNo', 'name', 'gender', 'age', 'address', 'phoneNo'];

    public function bed()
    {
        return $this->hasOne(Bed::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
