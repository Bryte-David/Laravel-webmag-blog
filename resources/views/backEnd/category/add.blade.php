@extends('backend.layout')
@section('title', $title)
@section('content')

<h1 class="h3 mb-2 text-gray-800">Add Category</h1>
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
              	<form method="Post" action="{{url('admin/category')}}" enctype="multipart/form-data">
              		@csrf
              		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                  <tbody>
	                    <tr>
	                    	<td>Title <span style="color: red">*</span></td>
	                        <td><input type="text" name="title" class="form-control"></td>
	                    </tr>
	                    <tr>
	                    	<td>Details <span style="color: red">*</span></td>
	                         <td><textarea name="detail" class="form-control"></textarea></td>
	                    </tr>
	                    <tr>
	                    	<td>Image <span style="color: red">*</span></td>
	                    	<td><input type="file" name="cat_image" class="form-control"></td>
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