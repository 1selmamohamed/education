<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();

        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.posts.create')->with('categories' , $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[

            'title'             => 'required|max:255',
            'featured_image'    => 'required|image|mimes:jpeg,png,jpg,svg,bmp,gif',
            'body'              => 'required',
            'category_id'       => 'required'
        ]);

        $image = $request->featured_image;
        $image_New_Name = time() . $image->getClientOriginalName();
        $image-> move('uploads/posts' , $image_New_Name);

        $post = Post::create([
            'title'             => $request->title,
            'featured_image'    => 'uploads/posts/' . $image_New_Name,
            'content'           => $request->body,
            'category_id'       => $request->category_id
        ]);

        Session::flash('succes' , 'The post added successfully');
//        dd($request->all());
       return  redirect()->route('posts');
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
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $categories = Category::all();

        Session::flash('info','Edit a new ');

        return view('admin.posts.edit',compact('post','categories'));
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
        //
        $this->validate($request,[

            'title'             => 'required|max:255',
            'featured_image'    => 'nullable|image|mimes:jpeg,png,jpg,svg,bmp,gif',
            'body'              => 'required',
            'category_id'       => 'required'
        ]);






        $post = Post::find($id);
        $post->title            = $request->title;
        $post->content          = $request->body;
        $post->category_id      = $request->category_id;

        if($request->featured_image){
            $image = $request->featured_image;
            $image_New_Name = time() . $image->getClientOriginalName();
            $image-> move('uploads/posts' , $image_New_Name);
            $post->featured_image = 'uploads/posts/' . $image_New_Name;
        }

        $post->save();

        Session::flash('succes','The New updated successfully');

        return redirect(route('posts'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();

        Session::flash('succes','The New deleted successfully');

        return redirect(route('posts'));
    }
}
