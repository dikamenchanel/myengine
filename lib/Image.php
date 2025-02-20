<?php

namespace lib;


class Image
{

    public function resizeAndConvertToWebP($sourcePath, $targetPath, $maxWidth, $keepAspectRatio = true) 
    {
        list($sourceWidth, $sourceHeight) = getimagesize($sourcePath);
        $sourceMimeType = mime_content_type($sourcePath);

        if ($sourceMimeType === 'image/jpeg') {
            $sourceImage = imagecreatefromjpeg($sourcePath);
        } elseif ($sourceMimeType === 'image/png') {
            $sourceImage = imagecreatefrompng($sourcePath);
        } elseif ($sourceMimeType === 'image/gif') {
            $sourceImage = imagecreatefromgif($sourcePath);
        } elseif ($sourceMimeType === 'image/jpg') {
            $sourceImage = imagecreatefromjpeg($sourcePath);
        } elseif ($sourceMimeType === 'image/webp') {
            $sourceImage = imagecreatefromwebp($sourcePath);
        } else {
            return false;
        }

        if ($keepAspectRatio) {
            // Рассчитываем новые размеры с сохранением пропорций
            if ($sourceWidth > $maxWidth) {
                $newWidth = $maxWidth;
                $newHeight = round(($maxWidth / $sourceWidth) * $sourceHeight);
            } else {
                $newWidth = $sourceWidth;
                $newHeight = $sourceHeight;
            }
        } else {
            $newWidth = $maxWidth;
            $newHeight = round(($maxWidth / $sourceWidth) * $sourceHeight);
        }

        // Создаем изображение с новыми размерами
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $sourceWidth, $sourceHeight);

        // Создаем изображение в формате WebP
        imagewebp($newImage, $targetPath);

        imagedestroy($sourceImage);
        imagedestroy($newImage);

        return true;
    }

    public function checkMimeType($image)
    {
        $sourceMimeType = mime_content_type($image);
        switch($sourceMimeType)
        {
            case 'image/jpeg':
            case 'image/jpg':
            case 'image/webp':
            case 'image/png':
            case 'image/avif':
            case 'image/heif':
                return true;
                break;
            default:
                return false;
                break;
        }
    }

}
