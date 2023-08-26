<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Profile extends Model
{
   
    public function roles()
    {
        return $this->belongsTo(Role::class);
    }
}
