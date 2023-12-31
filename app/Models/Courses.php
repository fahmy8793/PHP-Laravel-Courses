<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{

   // protected  $table = 'courses';
    protected $fillable = [
        'description'
        , 'price'
        , 'name'
        ,'ended_at'
        ,'category'
        ,'photo'
        ,'status'
        ,'started_at'
    ];
    use HasFactory;


    public function category()
    {
       return $this->belongsTo(Category::class);
    }
}
