<?php

namespace sabolsas;

use Illuminate\Database\Eloquent\Model;

class Mataprov extends Model
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'matriculap',
  ];
}
