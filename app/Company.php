<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_license', 'user_id', 'name', 'phone', 'slogan', 'address', 'uql', 
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
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    
}
