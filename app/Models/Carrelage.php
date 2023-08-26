<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrelage extends Model
{
    use HasFactory;

    protected $fillable = ['nom','qte','prix','description','status','dep_id','region_id','user_id','visibilite','categorie'];


    public function author(){
        return $this->belongsTo('App\Models\User');
    }

    public function blog_images(){
        return $this->hasMany('App\Models\BlogImage');
    }

    public function dep(){
        return $this->belongsTo(Dep::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

     public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
