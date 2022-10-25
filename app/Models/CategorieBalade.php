<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieBalade extends Model
{
    use HasFactory;
    protected $table = 'categorie_balades';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price'];

    public function balades()
    {
        return $this->hasMany(Balade::class); 
    }

    protected $casts = [
        'status' => BaladeStatus::class
    ];


}
