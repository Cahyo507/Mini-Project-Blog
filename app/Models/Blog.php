<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
  protected $fillable = ['title', 'konten', 'author'];
  protected $table = 'blog';
}