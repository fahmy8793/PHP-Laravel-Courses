<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    protected $table = 'category';
    // public function posts(): HasMany;


    protected $fillable = ['name', 'photo', 'status'];
    use HasFactory;
}
