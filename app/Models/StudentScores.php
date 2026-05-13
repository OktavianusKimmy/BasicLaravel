<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentScores extends Model
{
    protected $table = 'scores';
    protected $fillable = [
        'score'
    ];

    public function student(){
        return $this->belongsTo(Students::class, 'student_id');
    }
}
