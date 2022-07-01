<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentfee extends Model
{
    use HasFactory;
    public $table = "studentfee";


    public function student(){
        return $this->belongsTo(student::class);
    }

}