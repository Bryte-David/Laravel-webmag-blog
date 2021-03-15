@extends('backend.layout')
@section('title', $title)
@section('content')
 <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Categories Tables</h1>
                    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(Session::has("success"))
                  <p class="text-primary">{{session('success')}}</p>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                       <!-- <th>Category</th> -->
                      <th>Title</th>
                      <th>Details</th>
                      <th>Image</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <!-- <th>Category</th> -->
                      <th>Title</th>
                      <th>Details</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($category as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->title}}</td>
                        <td>{{$cat->detail}}</td>
                        <td>
                          <img src="{{asset('uploadImg/cat').'/'.$cat->cat_image}}" width="100">
                        </td>
                        <td>
                          <a href="{{url('admin/category/edit')}}/{{$cat['id']}}" class="btn btn-success">Update</a>
                          <a onclick="return confirm('Are you sure you want to delete data')" href="{{url('admin/category/delete')}}/{{$cat['id']}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

       
       @endsection('content')