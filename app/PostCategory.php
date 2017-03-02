<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class PostCategory extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'post_category';

    protected $guarded = array();

    public function posts(){
      return $this->hasMany(Post::class);
    }
}
