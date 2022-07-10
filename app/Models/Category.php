<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //call as a property not a method
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
