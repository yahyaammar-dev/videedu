<?php

namespace App\Models;

use App\Models\teacher;
use App\Models\questions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class admin extends Model
{
    use HasFactory;
    public $table = "admin";
    public $gaurded = [];

    public function teachers(){
        return $this->hasMany(teacher::class);
    }

    public function students(){
        return $this->hasMany(student::class);
    }

}