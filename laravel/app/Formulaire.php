<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulaire extends Model
{
  protected $table = 'formulaire';

  protected $fillable = [
      'title',
      'email',
  ];


  public function user()
  {
      return $this->belongsTo('\App\User');
  }

}
