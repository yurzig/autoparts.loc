<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search_results extends Model
{
    use HasFactory;
    protected $fillable = [
        'autopart_numb',
        'brand',
        'ip',
        'geo',
        'login',
    ];
}
