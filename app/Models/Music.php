<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'album_id', 'duration', 'file'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
