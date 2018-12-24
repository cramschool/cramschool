<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transcript extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'classroom_id', 'student_id', 'score', 'subject',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
