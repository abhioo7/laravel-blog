<?php
namespace App\Http\Controllers;
use App\Post;
use Session;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as Image;
use App\ImageModel;
use Storage;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        $post = Post:: orderBy('id', 'desc')->paginate(5);
        return view('post.index')->withPost($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create')->withCategories($categories)->withTags($tags);
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
		       'body' => 'required',
           'category_id' => 'required|integer',
           'featured_image' => 'sometimes|image'
        ));
	   $post = new Post;
		 $post->title = Input::get("title");
		 $post->body = Input::get("body");
     $post->category_id = Input::get("category_id");
     if($request->hasfile('featured_image'))
     {
       $image = $request->file('featured_image');
       $filename = time().'.'. $image->getClientOriginalExtension();
       $location = public_path('images/' . $filename);
       Image::make($image)->resize(800,400)->save($location);
       $post->Image = $filename;
     }
		 $post->save();
     $post->tags()->sync($request->tags,false);
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
        $tag = Tag::find($id);
      	return view('post.show')->withPost($post)->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        $tags = Tag::all();
        return view('post.edit')->withPost($post)->withCategories($categories)->withTags($tags);
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
            'body' => 'required',
            'category_id' => 'required|integer',
            'featured_image' => 'sometimes|image'

         ));

         $post = Post::find($id);
         $post->title = $request->input('title');
         $post->body = $request->input('body');
         $post->category_id = $request->input('category_id');

         if($request->hasfile('featured_image'))
         {
           $image = $request->file('featured_image');
           $filename = time().'.'. $image->getClientOriginalExtension();
           $location = public_path('images/' . $filename);
           Image::make($image)->resize(800,400)->save($location);
           $oldFilename = $post->image;
           $post->Image = $filename;
           Storage::delete($oldFilename);
         }
      $post->save();
      $post->tags()->sync($request->tags);
      Session::flash('success', 'This post was successfully saved.');
      return redirect()->route('post.show', $post->id);
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
        $post->tags()->detach();
        $post->delete();
        Session::flash('success','the post was successfully deleted');
        return redirect()->route('post.index');
    }
}
