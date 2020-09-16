<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    protected $fillable = [
        'ar_title',
        'en_title',
        'ar_description',
        'en_description',
        'ar_meta_tag',
        'en_meta_tag',
        'image',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\Service', 'parent_id');
    }

    public function getServiceImageAttribute()
    {
        return Storage::url('public/services/' . $this->image);
    }
}
