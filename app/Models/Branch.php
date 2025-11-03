<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'address',
        'phone',
        'email',
        'manager_name',
        'manager_phone',
        'manager_email',
        'whatsapp_number',
        'whatsapp_message',
        'latitude',
        'longitude',
        'maps_url',
        'image',
        'operating_hours',
        'services',
        'is_main_branch',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'operating_hours' => 'array',
        'services' => 'array',
        'is_main_branch' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function getGoogleMapsUrlAttribute()
    {
        if ($this->maps_url) {
            return $this->maps_url;
        }
        if ($this->latitude && $this->longitude) {
            return "https://www.google.com/maps?q={$this->latitude},{$this->longitude}";
        }
        return "https://www.google.com/maps/search/" . urlencode($this->address);
    }

    public function getOperatingHoursFormattedAttribute()
    {
        if (!$this->operating_hours) {
            return 'Senin - Jumat: 08:00 - 17:00';
        }

        $hours = [];
        foreach ($this->operating_hours as $day => $time) {
            $hours[] = ucfirst($day) . ': ' . $time;
        }
        return implode('<br>', $hours);
    }

    public function getServicesListAttribute()
    {
        if (!$this->services) {
            return [];
        }
        return $this->services;
    }

    public function getWhatsappUrlAttribute()
    {
        $phone = $this->whatsapp_number ?: $this->phone;
        $phone = str_replace(['+', ' ', '-'], '', $phone);
        
        $message = $this->whatsapp_message ?: "Halo, saya tertarik dengan layanan scaffolding dari cabang {$this->name}";
        
        return "https://wa.me/{$phone}?text=" . urlencode($message);
    }
}
