<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;


class ProfileController extends Controller
{
    function index(Request $request){
    	$user = Auth::user();
    	$category = Category::all();
    	return view('frontEnd.profile', [
    		'title'=> " Moblog Profile",
    		'user' => $user,
    		'category' => $category,
    	]);
    }

    function store_post(Request $request){
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
        $post->user_id = $request->user()->id;
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $uploadImage;
        $post->views = 0;
        $post->post_status = "pending";
        $post->save();

        return redirect("profile/")->with("success", "Post Created Successfully");
    }

    function update_profile(Request $request){
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string', 'max:255'],
        ]);

        if ($request->hasFile("profile_image")) {
            $image = $request->File('profile_image');
            $uploadImage = "profileImg".time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/uploadImg/profileImg');
            $image->move($dest, $uploadImage);
        }else{
            $uploadImage = $request->profile_image;
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->profile_image = $uploadImage;
        $user->about = $request->about;
        $user->save();

        return redirect("profile/")->with("success", "Profile Updated");

    }

    
}
