<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'company_license', 'password', 'account', 'mobile_phone',
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

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function belongToCompany()
    {
        return Company::where('company_license', $this->company_license)->first();
    }
    public function teacher(){
        
    }
}
