<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
  * The table
  *
  * @var string
  */
  protected $table = "articles";

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
  'user_id', 'title', 'content',
  ];

  /**
  * The attributes that are sould be hidden for arrays..
  *
  * @var array
  */
  protected $hidden = [

  ];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function comments()
  {
      return $this->hasMany('\App\Comment');
  }

  public function likes()
  {
      return $this->hasMany('\App\Like');
  }


}
