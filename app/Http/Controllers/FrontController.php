<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Setting;

class FrontController extends Controller
{
    private $settings = null;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Setting $setting)
    {
      $this->settings = $setting;
        //$this->middleware('auth');
    }

    public function variables($data = array()){
      $result = null;
      foreach($data as $dat){
        $result[$dat['name']] = $dat['value'];
      }
      $result['settings'] = $this->settings;
      return $result;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::simplePaginate(3);
        return view('front.home', $this->variables([['name'=>'posts', 'value'=>$posts]]));
    }
}
