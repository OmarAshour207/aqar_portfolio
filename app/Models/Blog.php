<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    protected $fillable = [
        'ar_author',
        'en_author',
        'ar_title',
        'en_title',
        'ar_content',
        'en_content',
        'ar_meta_tag',
        'en_meta_tag',
        'image'
    ];

    public function getBlogImageAttribute()
    {
        return Storage::url('public/blogs/' . $this->image);
    }
}
