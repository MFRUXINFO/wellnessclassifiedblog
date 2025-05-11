<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class ImageManager
{
    public static function uploadImage($image, $dir)
    {
        if ($image != null) {

            $destinationPath = public_path($dir);
            $fileName = env('APP_NAME') . '-' . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $fileName);
            return $dir . $fileName;
        }
    }

    public static function removeImage($image)
    {
        if (!empty($image) && File::exists(public_path($image))) {
            File::delete(public_path($image));
        }

        return [
            'success' => 1,
            'message' => 'Removed successfully !'
        ];
    }

    public static function updateImage($oldImage, $newImage, $dir)
    {
        if (!empty($oldImage) && File::exists(public_path($oldImage))) {
            File::delete(public_path($oldImage));
        }
        $imageName = ImageManager::uploadImage($newImage, $dir);

        return $imageName;

    }

}
