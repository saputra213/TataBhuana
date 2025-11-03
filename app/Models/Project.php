<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'client_name',
        'location',
        'start_date',
        'end_date',
        'project_type',
        'status',
        'images',
        'challenges',
        'solutions',
        'results',
        'is_featured',
        'sort_order'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'images' => 'array',
        'is_featured' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function getFormattedStartDateAttribute()
    {
        return $this->start_date->format('d M Y');
    }

    public function getFormattedEndDateAttribute()
    {
        return $this->end_date ? $this->end_date->format('d M Y') : 'Ongoing';
    }

    public function getDurationAttribute()
    {
        if ($this->end_date) {
            return $this->start_date->diffInDays($this->end_date) . ' hari';
        }
        return $this->start_date->diffInDays(now()) . ' hari (ongoing)';
    }

    public function getStatusBadgeAttribute()
    {
        switch ($this->status) {
            case 'completed':
                return 'success';
            case 'ongoing':
                return 'warning';
            case 'planning':
                return 'info';
            default:
                return 'secondary';
        }
    }

    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case 'completed':
                return 'Selesai';
            case 'ongoing':
                return 'Berlangsung';
            case 'planning':
                return 'Perencanaan';
            default:
                return 'Tidak Diketahui';
        }
    }
}





