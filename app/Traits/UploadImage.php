<?php

namespace App\Traits;

use App\Image;

trait UploadImage
{
    protected function uploadImage($image)
    {
        $name = $image->getClientOriginalName();
        $type = $image->getMimeType();
        $size = $image->getSize();
        $path = $image->store('public');

        return Image::make(compact('name', 'type', 'size', 'path'));
    }
}
