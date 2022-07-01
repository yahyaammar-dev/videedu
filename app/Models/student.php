<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    public $table = "student";
    public $gaurded = [];

    public function admin(){
        return $this->belongsTo(admin::class);
    }

    public function fees(){
        return $this->hasMany(studentfee::class);
    }

}
