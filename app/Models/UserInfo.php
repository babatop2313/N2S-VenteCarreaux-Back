<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Entreprise;


class UserInfo extends Model
{
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'adresse',
        'telephone',
        'user_id',
        'entreprise_id',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //public function userinfo()
    //{
    //    return $this->belongsTo(UserInfo::class);
   // }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
