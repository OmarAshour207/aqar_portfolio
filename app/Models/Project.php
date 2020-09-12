<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $fillable = [
        'ar_title',
        'en_title',
        'ar_description',
        'en_description',
        'ar_meta_tag',
        'en_meta_tag',
        'image'
    ];

    // Attributes
    public function getProjectImageAttribute()
    {
        return Storage::url('public/projects/' . $this->image);
    }
}
