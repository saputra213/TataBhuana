<?php

namespace App\Services;

class WatermarkService
{
    /**
     * Add watermark to image
     */
    public static function addWatermark($imagePath)
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
            
            // Create image resource based on type
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
            
            // Load logo image
            $logoPath = public_path('images/logo.png');
            if (!file_exists($logoPath)) {
                imagedestroy($image);
                return false;
            }
            
            // Get logo info
            $logoInfo = getimagesize($logoPath);
            if (!$logoInfo) {
                imagedestroy($image);
                return false;
            }
            
            // Create logo resource
            $logo = imagecreatefrompng($logoPath);
            if (!$logo) {
                imagedestroy($image);
                return false;
            }
            
            // Calculate watermark size and position
            // Logo will be 20% of image width or max 250px
            $logoWidth = min($width * 0.20, 250);
            $logoHeight = ($logoInfo[1] / $logoInfo[0]) * $logoWidth;
            
            // Calculate center position
            $x = ($width - $logoWidth) / 2;
            $y = ($height - $logoHeight) / 2;
            
            // Apply watermark pixel by pixel to preserve transparency with color adjustment
            for ($py = 0; $py < $logoHeight; $py++) {
                for ($px = 0; $px < $logoWidth; $px++) {
                    if ($x + $px < $width && $y + $py < $height) {
                        $srcX = intval(($px / $logoWidth) * $logoInfo[0]);
                        $srcY = intval(($py / $logoHeight) * $logoInfo[1]);
                        
                        if ($srcX < $logoInfo[0] && $srcY < $logoInfo[1]) {
                            $srcColor = imagecolorat($logo, $srcX, $srcY);
                            $alpha = ($srcColor >> 24) & 0xFF;
                            
                            // Only apply non-transparent pixels
                            if ($alpha < 127) {
                                // Extract RGB
                                $srcR = ($srcColor >> 16) & 0xFF;
                                $srcG = ($srcColor >> 8) & 0xFF;
                                $srcB = $srcColor & 0xFF;
                                
                                // Detect if this is a blue, red, or white part
                                $brightness = ($srcR + $srcG + $srcB) / 3;
                                
                                // Check if it's blue (circle and text)
                                if ($srcB > $srcR && $srcB > $srcG && $brightness < 200) {
                                    // Make it vibrant blue
                                    $srcR = 0;
                                    $srcG = 102;
                                    $srcB = 204;
                                }
                                // Check if it's red (star and scaffolding)
                                elseif ($srcR > $srcG && $srcR > $srcB && $brightness < 200) {
                                    // Make it vibrant red
                                    $srcR = 204;
                                    $srcG = 0;
                                    $srcB = 0;
                                }
                                // White/light areas
                                elseif ($brightness > 200) {
                                    // Make it white with slight transparency effect
                                    $srcR = 255;
                                    $srcG = 255;
                                    $srcB = 255;
                                }
                                // For other colored areas, keep the original color with enhancement
                                else {
                                    // Enhance saturation for better visibility
                                    $srcR = min(255, intval($srcR * 1.2));
                                    $srcG = min(255, intval($srcG * 1.2));
                                    $srcB = min(255, intval($srcB * 1.2));
                                }
                                
                                $dstColor = imagecolorat($image, $x + $px, $y + $py);
                                
                                $dstR = ($dstColor >> 16) & 0xFF;
                                $dstG = ($dstColor >> 8) & 0xFF;
                                $dstB = $dstColor & 0xFF;
                                
                                // Blend with 70% opacity for vibrant colors
                                $finalR = intval($dstR + ($srcR - $dstR) * 0.70);
                                $finalG = intval($dstG + ($srcG - $dstG) * 0.70);
                                $finalB = intval($dstB + ($srcB - $dstB) * 0.70);
                                
                                $finalColor = imagecolorallocate($image, $finalR, $finalG, $finalB);
                                imagesetpixel($image, $x + $px, $y + $py, $finalColor);
                            }
                        }
                    }
                }
            }
            
            // Clean up
            imagedestroy($logo);
            
            // Save the watermarked image
            switch ($mimeType) {
                case 'image/jpeg':
                    imagejpeg($image, $fullPath, 95);
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
            \Log::error('Watermark failed: ' . $e->getMessage());
            return false;
        }
    }
}
