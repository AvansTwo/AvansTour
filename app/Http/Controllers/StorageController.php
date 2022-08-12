<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
    /**
     * Get a single file by its path
     *
     * @return File
     */
    public static function get($path)
    {
        return \Storage::disk("digitalocean")->url($path);
    }

    /**
     * Upload a single file and return its path
     *
     * @return String
     */
    public static function upload($file, $folder)
    {
        return \Storage::disk("digitalocean")->putFile($folder, $file, 'public');
    }

    /**
     * Delete a single file and return its path
     *
     * @return String
     */
    public static function delete($path)
    {
        return \Storage::disk("digitalocean")->delete($path);
    }
}
