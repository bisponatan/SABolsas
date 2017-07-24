<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bolsa extends Model
{
  protected $table = 'bolsas';

  protected $fillable = array('name', 'formentador', 'duracao');

  protected $guarded = ['id'];

}
