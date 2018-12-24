<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'name', 'teacher_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function boss()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
