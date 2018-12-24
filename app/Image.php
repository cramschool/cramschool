<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name', 'path', 'size', 'type'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
