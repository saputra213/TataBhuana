<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WatermarkService;

class AddWatermarkToImages extends Command
{
    protected $signature = 'images:add-watermark';
    protected $description = 'Add watermark to all existing images';

    public function handle()
    {
        $this->info('Starting watermark process...');
        
        // Process project images
        $this->info('Processing project images...');
        $projectImages = \Storage::disk('public')->files('projects');
        foreach ($projectImages as $image) {
            try {
                $this->line("Processing: {$image}");
                WatermarkService::addWatermark($image);
                $this->info("✓ Added watermark to {$image}");
            } catch (\Exception $e) {
                $this->error("✗ Failed: {$image} - {$e->getMessage()}");
            }
        }
        
        // Process scaffolding images
        $this->info('Processing scaffolding images...');
        $scaffoldingImages = \Storage::disk('public')->files('scaffoldings');
        foreach ($scaffoldingImages as $image) {
            try {
                $this->line("Processing: {$image}");
                WatermarkService::addWatermark($image);
                $this->info("✓ Added watermark to {$image}");
            } catch (\Exception $e) {
                $this->error("✗ Failed: {$image} - {$e->getMessage()}");
            }
        }
        
        $this->info('Watermark process completed!');
    }
}


