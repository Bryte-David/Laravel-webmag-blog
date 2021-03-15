@extends('backend.layout')
@section('title', $title)
@section('content')

<h1 class="h3 mb-2 text-gray-800">Edit Category</h1>
                    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              	@if($errors)
              		@foreach($errors->all() as $err)
              		<p class="text-danger">{{$err}}</p>
              		@endforeach
              	@endif

              	@if(Session::has("success"))
              		<p class="text-primary">{{session('success')}}</p>
              	@endif
              	<form method="Post" action="{{url('admin/category/edit/'.$category->id)}}" enctype="multipart/form-data">
              		@csrf
              		<input type="hidden" name="id" value="{{$category->id}}">
              		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                  <tbody>
	                    <tr>
	                    	<td>Title <span style="color: red">*</span></td>
	                        <td><input type="text" name="title" value="{{$category->title}}" class="form-control"></td>
	                    </tr>
	                    <tr>
	                    	<td>Details <span style="color: red">*</span></td>
	                         <td><textarea name="detail" class="form-control">{{$category->detail}}</textarea></td>
	                    </tr>
	                    <tr>
	                    	<td>Image <span style="color: red">*</span></td>
	                    	<td>
	                    		<p><img src="{{asset('uploadImg/cat')}}/{{$category->cat_image}}" width="150"></p>
	                    		<input type="hidden" name="cat_image" value="{{$category->cat_image}}">
	                    		<input type="file" name="cat_image" class="form-control"></td>
	                    </tr>
	                    <tr>
	                    	<td></td>
	                    	<td>
	                    		<input type="submit" name="" class="btn btn-primary" value="Submit">
	                    	</td>
	                    </tr>
	                  </tbody>
	                </table>
              	</form>
	                
              </div>
            </div>
          </div>
@endsection('content')