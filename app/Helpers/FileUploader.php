<?php

namespace Learn\Helpers;

use Cloudinary;
use Cloudinary\Uploader;

class FileUploader
{
    public function __construct()
    {
        // Fetch the configuration parameters.
        $config = [
            'cloud_name' => env('CLOUDINARY_NAME'),
            'api_key' => env('CLOUDINARY_KEY'),
            'api_secret' => env('CLOUDINARY_SECRET'),
        ];
        Cloudinary::config($config);
    }

    /**
     * Upload a file to cloudinary.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile
     * @param array
     * @return array
     */
    public function uploadFile($file, $options = [])
    {
        if (empty($options)) {
            $options = [
                'crop' => 'fill',
                'width' => '240',
                'height' => '240',
            ];
        }

        return Uploader::upload($file, $options);
    }
}
