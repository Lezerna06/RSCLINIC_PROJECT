<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_email', 'email');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function medicalhistory(){
        return $this->hasMany(Medicalhistory::class);
    }
}
