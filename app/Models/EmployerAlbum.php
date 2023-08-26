<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerAlbum extends Model
{
    use HasFactory;

    protected $fillable = ['nom','fonction','telephone','photo'];



}
