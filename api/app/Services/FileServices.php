<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class FileServices
{
    public function __construct()
    {
        //
    }

    /**
     * savePhoto
     *
     * @param  mixed $width
     * @param  mixed $image
     * @param  mixed $path
     * @param  mixed $imageFileName
     * @param  mixed $repo
     * @return void
     */
    public function savePhoto($width,$image, $path, $imageFileName, $repo = 'public')
    {
        $img=Image::make($image)->resize($width, $width, function ($constraint) {
            $constraint->aspectRatio();
        })->response();
        $publicDisk = Storage::disk($repo);
        $filePath = $path . '/' . $imageFileName;
        $publicDisk->put($filePath, $img->getContent(), 'public');

        return $filePath;
    }
}
