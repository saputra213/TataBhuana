<?php

namespace App\Services;

class ImageProcessingService
{
    /**
     * Process image: resize and replace background with white
     */
    public static function processProductImage($imagePath, $maxWidth = 1200, $quality = 90)
    {
        $fullPath = storage_path('app/public/' . $imagePath);
        
        if (!file_exists($fullPath)) {
            return false;
        }
        
        try {
            $imageInfo = getimagesize($fullPath);
            
            if (!$imageInfo) {
                return false;
            }
            
            $mimeType = $imageInfo['mime'];
            $width = $imageInfo[0];
            $height = $imageInfo[1];
            
            // Create image resource
            switch ($mimeType) {
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($fullPath);
                    break;
                case 'image/png':
                    $image = imagecreatefrompng($fullPath);
                    break;
                case 'image/gif':
                    $image = imagecreatefromgif($fullPath);
                    break;
                default:
                    return false;
            }
            
            if (!$image) {
                return false;
            }
            
            // Enable alpha blending for PNG
            if ($mimeType == 'image/png') {
                imagealphablending($image, true);
                imagesavealpha($image, true);
            }
            
            // Step 1: Replace background with white
            self::replaceBackgroundWithWhite($image, $width, $height);
            
            // Step 2: Resize if needed
            if ($width > $maxWidth) {
                $newHeight = intval(($height * $maxWidth) / $width);
                $resized = imagecreatetruecolor($maxWidth, $newHeight);
                
                if ($mimeType == 'image/png') {
                    imagealphablending($resized, false);
                    imagesavealpha($resized, true);
                }
                
                imagecopyresampled($resized, $image, 0, 0, 0, 0, $maxWidth, $newHeight, $width, $height);
                imagedestroy($image);
                $image = $resized;
                $width = $maxWidth;
                $height = $newHeight;
            }
            
            // Save the processed image
            switch ($mimeType) {
                case 'image/jpeg':
                    imagejpeg($image, $fullPath, $quality);
                    break;
                case 'image/png':
                    imagesavealpha($image, true);
                    imagepng($image, $fullPath, 9);
                    break;
                case 'image/gif':
                    imagegif($image, $fullPath);
                    break;
            }
            
            imagedestroy($image);
            
            return true;
        } catch (\Exception $e) {
            \Log::error('Image processing failed: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Replace background with white using flood fill from corners
     */
    private static function replaceBackgroundWithWhite($image, $width, $height)
    {
        // Create white color
        $white = imagecolorallocate($image, 255, 255, 255);
        
        // Flood fill from all four corners (handles transparent backgrounds)
        $corners = [
            [0, 0],                    // Top-left
            [$width - 1, 0],          // Top-right
            [0, $height - 1],         // Bottom-left
            [$width - 1, $height - 1] // Bottom-right
        ];
        
        foreach ($corners as $corner) {
            $x = $corner[0];
            $y = $corner[1];
            
            $color = imagecolorat($image, $x, $y);
            
            // Only flood fill if the color is not already white
            $r = ($color >> 16) & 0xFF;
            $g = ($color >> 8) & 0xFF;
            $b = $color & 0xFF;
            
            if (!($r == 255 && $g == 255 && $b == 255)) {
                imagefill($image, $x, $y, $white);
            }
        }
        
        // For better results, also flood fill based on brightness threshold
        // This helps with semi-transparent backgrounds
        for ($y = 0; $y < $height; $y++) {
            for ($x = 0; $x < $width; $x++) {
                $color = imagecolorat($image, $x, $y);
                $r = ($color >> 16) & 0xFF;
                $g = ($color >> 8) & 0xFF;
                $b = $color & 0xFF;
                $brightness = ($r + $g + $b) / 3;
                
                // Replace very light/bright areas (likely background) with white
                if ($brightness > 240) {
                    imagesetpixel($image, $x, $y, $white);
                }
            }
        }
    }
}



