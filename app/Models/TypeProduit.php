<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeProduit extends Model
{
    use HasFactory;
    protected $table = 'type_produits';
    
    protected $fillable = ['nomType'];

    public function carrelages(): HasMany 
    { 
        return $this->hasMany(Carrelage::class); 
    }
}

