<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class MediaManagementService
{
    public static function uploadMedia($file, $path, $disk)
    {
        try {
            return Storage::disk($disk)->putFile($path, $file);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    public static function removeMedia($file, $path, $disk): bool
    {
        return Storage::disk($disk)->delete($path.'/'.$file);
    }
}
