<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    protected $table = 'boleta';
    protected $fillable =['estado','monto','user','mes'];
}
