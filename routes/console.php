<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Services\WatermarkService;
use App\Services\ImageProcessingService;
use Illuminate\Support\Facades\Storage;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('images:add-watermark', function () {
    $this->info('Starting watermark process...');
    
    // Process project images (recursively in all subfolders)
    $this->info('Processing project images...');
    $projectDirectories = Storage::disk('public')->directories('projects');
    $projectCount = 0;
    
    foreach ($projectDirectories as $directory) {
        $images = Storage::disk('public')->files($directory);
        foreach ($images as $image) {
            try {
                $this->line("Processing: {$image}");
                if (WatermarkService::addWatermark($image)) {
                    $this->info("✓ Added watermark to {$image}");
                    $projectCount++;
                }
            } catch (\Exception $e) {
                $this->error("✗ Failed: {$image} - {$e->getMessage()}");
            }
        }
    }
    
    // Process scaffolding images
    $this->info('Processing scaffolding images...');
    $scaffoldingImages = Storage::disk('public')->files('scaffoldings');
    $scaffoldCount = 0;
    foreach ($scaffoldingImages as $image) {
        try {
            $this->line("Processing: {$image}");
            if (WatermarkService::addWatermark($image)) {
                $this->info("✓ Added watermark to {$image}");
                $scaffoldCount++;
            }
        } catch (\Exception $e) {
            $this->error("✗ Failed: {$image} - {$e->getMessage()}");
        }
    }
    
    $this->info("Completed! Processed {$projectCount} project images and {$scaffoldCount} scaffolding images.");
})->purpose('Add watermark to all existing images');

Artisan::command('images:process-products', function () {
    $this->info('Processing product images (resize and white background)...');
    
    // Process scaffolding images
    $scaffoldingImages = Storage::disk('public')->files('scaffoldings');
    $scaffoldCount = 0;
    foreach ($scaffoldingImages as $image) {
        try {
            $this->line("Processing: {$image}");
            if (ImageProcessingService::processProductImage($image, 1200, 90)) {
                $this->info("✓ Processed {$image}");
                $scaffoldCount++;
            }
        } catch (\Exception $e) {
            $this->error("✗ Failed: {$image} - {$e->getMessage()}");
        }
    }
    
    $this->info("Completed! Processed {$scaffoldCount} product images.");
})->purpose('Process existing product images with resize and white background');
