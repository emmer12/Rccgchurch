<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = [
        'display_url',
    ];


    public function getDisplayUrlAttribute()
    {
        $src = $this->getAttribute('display');
        if (is_null($src)) {
            return null;
        }
        if (!empty($this->display)) {
            return asset('storage/' . $this->display);
        }
        return null;
    }
}
