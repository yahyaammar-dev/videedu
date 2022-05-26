<?php

namespace App\Models;

use App\Models\questions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class teacher extends Model
{
    use HasFactory;
    public $table = "teacher";
    public $gaurded = [];


    public function question(){
        return $this->hasMany(questions::class, 'teacher_id', 'id');
    }

}
