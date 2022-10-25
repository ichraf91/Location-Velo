<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Velo extends Model
{
    use HasFactory;
   
    protected $primaryKey = 'id';
    protected $fillable = ['marque','description','photo'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    

    
}
