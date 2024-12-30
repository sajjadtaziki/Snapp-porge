<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class the_driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Family',
        'Code_meli',
        'Number_p',
        'Image',
        'phone',
    ];
}
