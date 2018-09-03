<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
 public function login()
 {
     return view('auth.login');
 }

 /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
 public function loginPost()
 {
   $this->validate($request,array(
         'title' => 'required|max:225',
         'body' => 'required'
      ));
 }

 /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
 public function store(Request $request)
 {
  $this->validate($request,array(
        'title' => 'required|max:225',
        'body' => 'required'
     ));
  $post = new Post;
  $post->title = Input::get("title");
  $post->body = Input::get("body");
  $post->save();
  Session::flash('success','The blog post was successfully saved');
  return redirect()->route('post.show',$post->id);

 }

 /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function show($id)
 {
     $post = Post::find($id);
     return view('post.show')->withPost($post);
 }

 /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function edit($id)
 {
     $post = Post::find($id);
     return view('post.edit')->withPost($post);
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
   $this->validate($request,array(
         'title' => 'required|max:225',
         'body' => 'required'
      ));
   $post = Post::find($id);
   $post->title = $request->input('title');
   $post->body = $request->input('body');
   $post->save();
   Session::flash('success','This post was successfully saved');
   return redirect()->route('post.show',$post->id);
 }

 /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function destroy($id)
 {
     $post = Post::find($id);
     $post->delete();
     Session::flash('success','the post was successfully deleted');
     return redirect()->route('post.index');
 }
}
