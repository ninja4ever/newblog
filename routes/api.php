<?php

use Illuminate\Http\Request;

use App\Post;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/posts/{id?}', function(Request $request, $id = null){
  if($id == null){
    return Post::with('postcategory')->where('active', 1)->get();
  }
  else{
    $post = Post::with('postcategory')->where('active', 1)->where('id', $id)->get();
    if(sizeof($post)>0){
      return $post;
    }
    else{
      $error = ['error'=>'no post'];
      return $error;
    }
  }
});
