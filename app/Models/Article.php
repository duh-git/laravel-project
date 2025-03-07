<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  use HasFactory;
  protected $guarded = ['id'];
  // protected $fillable = ['title', 'datePublic', 'desc', 'shortDesc'];

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }
}
