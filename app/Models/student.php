<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey ='id';
    protected $fillable=[
        'name',
        'roll',
        'img_url',
        '_token',

    ];

}
