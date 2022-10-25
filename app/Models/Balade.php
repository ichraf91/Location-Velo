<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balade extends Model
{
    use HasFactory;

    protected $table = 'balade';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address', 'mobile'];
}

