<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

class City extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function postcity()
    {
        return $this->hasMany(PostCity::class);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
