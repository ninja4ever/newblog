<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PostCategory;

class Post extends Model
{
  /**
   * Get the user that owns the posts
   */
  public function user()
  {
      return $this->belongsTo(User::class);
  }
  public function scopeOrder($query){
    return $query->orderBy('created_at', 'desc');
  }

  public function scopeOnlyActive($query){
    return $query->where('active', 1);
  }

  public function postcategory(){
    return $this->belongsTo(PostCategory::class, 'category');
  }
}
