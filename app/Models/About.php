<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class About extends Model
{
    protected $fillable = [
        'ar_title',
        'en_title',
        'ar_description',
        'en_description',
        'image'
    ];

    public function getAboutImageAttribute()
    {
        return Storage::url('public/aboutus/' . $this->image);
    }
}
