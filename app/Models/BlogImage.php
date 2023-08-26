<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;

    protected $fillable = ['carrelage_id','blog_image','blog_image_titre'];


    public function carrelage(){
        return $this->belongsTo('App\Models\Carrelage');
    }
}
