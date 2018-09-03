<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','body'];
      public $table = "post";
    public function SellerResetPasswordNotification($token)
    {
      $this->notify(new SellerResetPasswordNotification($token));
    }
    public function category() {
      return $this->belongsTo('App\Category');
    }
    public function tags()
    {
      return $this->belongsToMany('App\Tag');
    }
    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
}