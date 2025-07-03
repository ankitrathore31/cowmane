<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_name',
        'message',
        'numbers',
        'images',
        'video',
        'pdf',
    ];
}
