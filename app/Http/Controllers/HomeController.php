<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class HomeController extends Controller
{
    function index(Request $request){
        if($request->has('search')){
            $q = $request->search;
            $post = Post::where("title", "like", "%".$q."%")->orderBy("id", "desc")->paginate(2);
        }else{
            $post =  Post::orderBy('id', 'desc')->paginate(4);
        }

        $category = Category::all();
    	return view('frontEnd.home', [
            'category' => $category,
    		"posts" => $post
    	]);
    }

    function blogDetail(Request $request, $slug, $postId){
        Post::find($postId)->increment("views");
    	$detail = Post::find($postId);
    	return view('frontEnd.blogDetail', [
    		"detail"=> $detail
    	]);
    }

    function save_comment(Request $request, $slug, $id){
        $request->validate([
            'name'=>'required',
            'message'=>'required'
        ]);

        $data = new Comment;
        $data->user_id = $request->User()->id ;
        $data->name = $request->name;
        $data->post_id = $id;
        $data->comments = $request->message;
        $data->save();
        return redirect('blog-detail/'.$slug.'/'.$id)->with("success", "Comment Submitted");
    }

    function category_posts(Request $request, $cat_slug, $cat_id){
        $category = Category::find($cat_id);
        $posts = Post::where('cat_id', $cat_id)->orderBy('id', 'desc')->paginate(1);
        return view('frontEnd.category', [
            'posts'=> $posts, 
            'category'=> $category
        ]);
    }

}
