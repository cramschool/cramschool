<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'order', 'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
