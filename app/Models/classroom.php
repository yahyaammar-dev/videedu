<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\teacher;

class classroom extends Model
{

    use HasFactory;
    public $table = "classroom";
    public $gaurded = [];

    public function teacher(){
        return $this->belongsTo(teacher::class);
    }

}