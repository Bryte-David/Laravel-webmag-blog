<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view("backend.post.index", [
            "posts" => $post,
            "title" => "Posts"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view("backend.post.add", [
            "category" => $category,
            "title" => "New Post"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "category" => "required",
            "title" => "required",
            "body" => "required",
            "post_image" => "required",
        ]);

        if ($request->hasFile("post_image")) {
            $image = $request->File("post_image");
            $uploadImage = "postImg".time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/uploadImg/post');
            $image->move($dest, $uploadImage);
        }

        $post = new Post;
        $post->user_id = 0;
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $uploadImage;
        $post->views = 0;
        $post->save();

        return redirect("admin/post/create")->with("success", "Post Created Successfully");


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
        $post = Post::find($id);
        $category = Category::all();
        return view("backend.post.edit", [
            "category"=> $category,
            "post"=> $post,
            "title" => "Edit post"
        ]);
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
        $request->validate([
            "category" => "required",
            "title" => "required",
            "body" => "required",
            "post_image" => "required",
        ]);

        if ($request->hasFile("post_image")) {
            $image = $request->File("post_image");
            $uploadImage = "postImg".time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/uploadImg/post');
            $image->move($dest, $uploadImage);
        }else{
            $uploadImage = $request->post_image;   
        }

        $post = Post::find($id);
        $post->user_id = 0;
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $uploadImage;
        $post->post_status = "approved";
        $post->save();

        return redirect("admin/post/".$id."/edit")->with("success", "Post Updated Successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where("id", $id)->delete();
        return redirect("admin/post");
    }
}
