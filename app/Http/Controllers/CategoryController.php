<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    function index(){
        $category = Category::all();
    	return view('backend.category.index',[
            "category" => $category,
    		'title'=>'Categories'
    	]);
    }
    
    //add category view
    function add_category(){
    	return view('backend.category.add',[
    		'title'=> 'Add Category'
    	]);
    }


    //store category in db
    function store_category(Request $request){
        $request->validate([
            "title" => "required",
            "detail" => "required",
            "cat_image" => "required"
        ]);

        if ($request->hasFile("cat_image")) {
            $image = $request->File('cat_image');
            $uploadImage = "catImg".time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/uploadImg/cat');
            $image->move($dest, $uploadImage);
        }

        $category = new Category;
        $category->title = $request->title;
        $category->detail = $request->detail;
        $category->cat_image = $uploadImage;
        $category->save();

        return redirect("admin/add-category")->with("success", "Category has been Created");
    }

    //Update category view
    function edit_category($id){
        $data = Category::find($id);
        return view('backend.category.edit', [
            'category' => $data,
            'title'=> "Edit Category"
        ]);
    }

    //Update category in db
    function update_category(Request $request){
        $request->validate([
            "title" => "required",
            "detail" => "required",
            "cat_image" => "required"
        ]);

        if ($request->hasFile("cat_image")) {
            $image = $request->File('cat_image');
            $uploadImage = "catImg".time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/uploadImg/cat');
            $image->move($dest, $uploadImage);
        }else{
            $uploadImage = $request->cat_image;
        }

        $category = Category::find($request->id);
        $category->title = $request->title;
        $category->detail = $request->detail;
        $category->cat_image = $uploadImage;
        $category->save();

        return redirect("admin/category/edit/".$request->id)->with("success", $request->title." "."category has been updated");

    }

    function delete_category($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category')->with("success", "Successfully Deleted");
    }





}
