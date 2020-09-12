<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $fillable = [
        'ar_name',
        'en_name',
        'ar_title',
        'en_title',
        'ar_description',
        'en_description',
        'ar_meta_tag',
        'en_meta_tag',
        'image'
    ];

    public function getTestimonialImageAttribute()
    {
        return Storage::url('public/testimonials/' . $this->image);
    }
}
