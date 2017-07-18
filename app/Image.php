<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $fillable = [
      'nom', 'fullname', 'user_id', 'public',
  ];
}
