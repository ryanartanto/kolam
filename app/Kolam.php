<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kolam extends Model
{
     protected $table = "kolam";
     protected $fillable = ['kolam','suhu','ph'];
}
