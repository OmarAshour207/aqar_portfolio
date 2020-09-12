<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $fillable = [
        'ar_title',
        'en_title',
        'ar_description',
        'en_description',
        'image',
    ];

    // Attributes
    public function getSliderImageAttribute()
    {
        return Storage::url('public/slider/' . $this->image);
    }

}
