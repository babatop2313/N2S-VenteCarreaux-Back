<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserInfo;

class Entreprise extends Model
{
    protected $fillable = [
        'id',
        'entreprise',
        'adresse',
        'telephone',
        'secteur',
    ];

    public function userinfo()
    {
        return $this->hasOne(UserInfo::class);

    }



}
