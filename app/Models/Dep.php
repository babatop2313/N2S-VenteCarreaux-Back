<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dep extends Model
{
    use HasFactory;
    protected $fillable = ['nom','region_id'];


    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
