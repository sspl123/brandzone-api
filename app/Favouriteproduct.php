<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favouriteproduct extends Model
{
   protected $fillable = [
        'userid', 'productid',
    ];
}
