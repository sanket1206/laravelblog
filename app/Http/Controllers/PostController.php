<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
        return view ('blog.index')->with('posts',Post::orderBy('updated_at','DESC'));
               

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'image'=> 'required|mimes:jpg,png,jpeg|max:5048'

        ]);

        $newImageName = uniqid() . '_' . $request->title . '.' .
        $request->image->extension();

        $request->image->move(public_path('images'),$newImageName);

        Post::create([
            'title'=>$request->input('title'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
            'image_path'=>$newImageName,
            'user_id'=>auth()->user()->id
            
        ]);

        return redirect('/blog')->with('message','Your post has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('blog.show')->with('post',Post::where('slug',$slug));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('blog.edit')->with('post',Post::where('slug',$slug->first()));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'description'=>'required',
            

        ]);
        Post::where('slug',$slug)->update([
            'title'=>$request->input('title'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
            
            'user_id'=>auth()->user()->id

        ]);
        return redirect('/blog')->with('message','Your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::where('slug',$slug);
        $post->delete();
        return redirect('/blog')->with('message','Your post has been deleted');
    }
}
