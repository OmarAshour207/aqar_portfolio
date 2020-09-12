<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TeamMember extends Model
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

    // Attributes
    public function getMemberImageAttribute()
    {
        return Storage::url('public/team-members/' . $this->image);
    }
}
