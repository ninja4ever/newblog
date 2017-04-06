<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Setting;
use App\PostCategory;

class FrontController extends Controller
{
    private $settings = null;
    private $categorys = null;
    private $latest_posts = null;
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
        $this->latest_posts = Post::where('active', 1)->orderBy('updated_at', 'desc')->limit(5)->get();
        //$this->middleware('auth');
    }

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::where('active', 1)->simplePaginate($this->paginate_limit);

        return view('front.home', $this->variables([['name'=>'posts', 'value'=>$posts]]));
    }

    public function category($slug){
        $category = PostCategory::where('slug', $slug)->first();
        $posts = Post::where(['category'=> $category->id, 'active'=>1])->simplePaginate($this->paginate_limit);
        return view('front.home', $this->variables([['name'=>'posts', 'value'=>$posts]]));
    }

}
