<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Validator;
use Illuminate\Support\Str;
use File;

class PageController extends Controller
{

   private $messages = [
      'title.required' => 'Pole tytułu jest wymagane',
      'title.unique' => 'Tytuł strony jest już w bazie',
      'title.max'=>'Tytuł nie może przkroczyć :max znaków',
      'body.required'=>'Pole wymagane',
      'slug.required'=>'Pole linku jest wymagane',
      'slug.unique'=>'Pole linku musi byc unikalne',
      'slug.max'=>'Pole linku nie może przkroczyć :max znaków',
      'active.required'=>'Zaznaczenie pola jest wymagane',
      'image.required' => 'Obrazek obiektu jest wymagany',
      'image.mimes' => 'Dozwolone są tylko pliki jpeg, jpg, png',
      'image.max' => 'Maksymalny rozmiar pliku to :max kb',
    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pages = Page::orderBy('created_at', 'desc')->get();
      return view('admin.pages.index', ['pages'=>$pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $image = $request->image;
       $validator = Validator::make($request->all(), [
         'title' => 'required|unique:pages|max:255',
         'body' => 'required',
         'slug'=>'required|unique:pages|max:255',
         'active'=>'required|in:0,1',
         'image'=> 'nullable|image|mimes:jpeg,png,jpg|max:1500',
       ], $this->messages);
       if ($validator->fails()) {
         \Session::flash('alert-warning', trans('messages.page_add_message_warning'));
           return redirect('/pages/add')
               ->withInput()
               ->withErrors($validator);
       }
       $fileName = '';
       if($image){
         $extension = $image->getClientOriginalExtension(); // getting image extension
         $fileName = md5(date('Y-m-d H:i:s:u')).rand(11111,99999).'.'.$extension; // renameing image
         $image->move('uploads/pages-image/', $fileName);
       }

       Page::create([
         'title' => $request->title,
         'body' => $request->body,
         'slug'=>str_slug($request->slug, '-'),
         'excerpt' => Str::words($request->body),
         'active'=>$request->active,
         'image' => $fileName,
       ]);
       \Session::flash('alert-success', trans('messages.page_add_message_success'));
       return redirect('/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
      $page = Page::find($page->id);
      return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $page = Page::find($id);
      $image = $request->image;

     $validator = Validator::make($request->all(), [
       'title' => 'required|unique:pages,id,'.$page->id.'|max:255',
       'body' => 'required',
       'slug'=>'required|unique:pages,id,'.$page->id.'|max:255',
       'active'=>'required|in:0,1',

       'image'=> 'nullable|image|mimes:jpeg,png,jpg|max:1500',
     ], $this->messages);
     if ($validator->fails()) {
       \Session::flash('alert-warning', trans('messages.page_add_message_warning'));
         return redirect('/pages/edit/'.$id)
             ->withInput()
             ->withErrors($validator);
     }
     $fileName = '';
     if($image){
       $extension = $image->getClientOriginalExtension(); // getting image extension
       $fileName = md5(date('Y-m-d H:i:s:u')).rand(11111,99999).'.'.$extension; // renameing image
       $image->move('uploads/pages-image/', $fileName);
       $page->image = $fileName;
      }

      $page->title = $request->title;
      $page->body = $request->body;
      $page->updated_at = date('Y-m-d H:i:s');
      $page->slug = str_slug($request->slug, '-');
      $page->excerpt = Str::words($request->body);
      $page->active = $request->active;
      $page->update();

     \Session::flash('alert-success', trans('messages.page_update_message_success_update'));
     return redirect('/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Page $page)
    {
      $page->delete();
      \Session::flash('alert-success', trans('messages.page_message_delete'));
      return redirect('/pages');
    }

    /**
     * publish the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publishPage(Request $request, Page $page){
      $page->active = $request->input('active');
      $page->updated_at = date('Y-m-d H:i:s');
      $page->update();
      \Session::flash('alert-success', trans('messages.page_update_message_success'));
      return redirect('/pages');
    }
}
