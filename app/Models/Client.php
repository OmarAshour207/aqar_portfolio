<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Client extends Model
{
    protected $fillable = [
        'ar_name',
        'en_name',
        'image'
    ];

    public function getClientImageAttribute()
    {
        return Storage::url('public/clients/' . $this->image);
    }
}
