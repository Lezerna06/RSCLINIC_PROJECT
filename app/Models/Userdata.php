<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
