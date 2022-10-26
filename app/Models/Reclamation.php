<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'titre',
        'description',
        'user_id',
        'categorie_id',
        'status',
        'date_rec'
    ];

    public function categorie()
    {
        return $this->belongsTo(CategorieReclamation::class, 'categorie_id', 'id');
    }
}
