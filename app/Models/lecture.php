<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\classroom;

class lecture extends Model
{
    use HasFactory;
    public $table = "lectures";
    public $timestamps = "false";
      public function classroom(){
        return $this->belongsTo(classroom::class);
    }
}
