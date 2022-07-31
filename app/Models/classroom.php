<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\teacher;
use App\Models\lecture;

class classroom extends Model
{

    use HasFactory;
    public $table = "classroom";
    public $gaurded = [];

    public function teacher(){
        return $this->belongsTo(teacher::class);
    }

    public function lecture(){
        return $this->hasMany(lecture::class);
    }

}