@extends('backend.layout')
@section('title', $title)
@section('content')

<h1 class="h3 mb-2 text-gray-800">Create Post</h1>
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
              	<form method="Post" action="{{url('admin/post/'.$post->id)}}" enctype="multipart/form-data">
              		@csrf
              		@method('patch')
              		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                  <tbody>
	                  	<tr>
	                  		<td>Category <span style="color: red">*</span></td>
	                  		<td>
	                  			<select class="form-control" name="category">
	                  				@foreach($category as $cats)
	                  				<option value="{{$cats->id}}">{{$cats['title']}}</option>
	                  				@endforeach
	                  			</select>
	                  		</td>
	                  		
	                  	</tr>
	                    <tr>
	                    	<td>Title <span style="color: red">*</span></td>
	                        <td><input type="text" name="title" value="{{$post->title}}" class="form-control"></td>
	                    </tr>
	                    <tr>
	                    	<td>Details <span style="color: red">*</span></td>
	                         <td><textarea name="body" class="form-control">{{$post->body}}</textarea></td>
	                    </tr>
	                    <tr>
	                    	<td>Image <span style="color: red">*</span></td>
	                    	<td>
	                    		<p><img src="{{asset('uploadImg/post')}}/{{$post->image}}" width="150"></p>
	                    		<input type="hidden" name="post_image" value="{{$post->image}}">
	                    		<input type="file" name="post_image" class="form-control"></td>
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