<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Velo;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $primaryKey = 'id';
    protected $fillable=['name','slug'];

    public function velos()
    {
        return $this->hasMany(Velo::class);
    }

}
