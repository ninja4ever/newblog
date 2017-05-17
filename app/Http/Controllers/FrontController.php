<?php
/**
 * FRONT CONTROLLER
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Setting;
use App\PostCategory;

class FrontController extends Controller
{
    //settings (collection)
    private $settings = null;
    //posts category (collection)
    private $categorys = null;
    //latest posts (collection)
    private $latest_posts = null;
    //latest post limit (int)
    private $latest_post_limit = 5;
    //posts per page (int)
    private $paginate_limit = 5;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->settings = Setting::all();
        $this->categorys = PostCategory::all();
        $this->latest_posts = Post::where('active', 1)
        ->orderBy('updated_at', 'desc')
        ->limit($this->latest_post_limit)->get();
        //$this->middleware('auth');
    }
    /**
     * function extends variables with settins, post categorys and latest posts
     * @param  array  $data input data, pair name:value
     * @return array
     */
    public function variables($data = array()){
        $result = null;
        foreach($data as $dat){
            $result[$dat['name']] = $dat['value'];
        }
        $result['settings'] = $this->settings;
        $result['postcategory'] = $this->categorys;
        $result['latestposts'] = $this->latest_posts;

        return $result;
    }
    /**
     * Show the application index.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('postcategory')->where('active', 1)->simplePaginate($this->paginate_limit);
        return view('front.home', $this->variables([['name'=>'posts', 'value'=>$posts]]));
    }
    /**
     * show posts belongs to category
     * @param  string $slug category slug
     * @return view
     */
    public function category($slug){
        $category = PostCategory::where('slug', $slug)->first();
        $posts = Post::where(['category'=> $category->id, 'active'=>1])->simplePaginate($this->paginate_limit);
        return view('front.home', $this->variables([['name'=>'posts', 'value'=>$posts]]));
    }
    /**
     * show single post
     * @param  string $category category slug
     * @param  string $slug     post slug
     * @return view
     */
    public function single($category ,$slug){
      $post = Post::with('postcategory')->where(['slug'=>$slug, 'active'=>1])->first();
      return view('front.single', $this->variables([['name'=>'posts', 'value'=>$post]]));
    }
    /**
     * search form redirect, keyword change [space] to [+]
     * @param  Request $request
     * @return redirect
     */
    public function search(Request $request){
      $keyword = $request->search;
      $keyword = preg_replace('/\s+/', '+', $keyword);
      return redirect('/search-result/'.$keyword);
    }
    /**
     * search result function
     * first search category where name, if no find search post where title or body
     * contains keyword
     * @param  string $keyword keyword to search
     * @return view
     */
    public function search_result($keyword){
        $keyword = str_replace('+', ' ', $keyword);
        $category = PostCategory::where('name','like', '%'.$keyword.'%')->first();
        $posts = null;
        if(sizeof($category)>0){
          $posts = Post::with('postcategory')
          ->where(['category'=> $category->id, 'active'=>1])
          ->simplePaginate($this->paginate_limit);
        }
        elseif(!$category){
          $posts = Post::with('postcategory')
          ->where([['title','like', '%'.$keyword.'%'], ['active',1]])
          ->orWhere([['body','like', '%'.$keyword.'%'], ['active',1]])
          ->simplePaginate($this->paginate_limit);
        }
        return view('front.search', $this->variables([['name'=>'posts', 'value'=>$posts]]));
    }
}
