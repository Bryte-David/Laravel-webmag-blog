@extends('backend.layout')
@section('title', $title)
@section('content')

 <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
                    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>About</th>
                      <th>Image</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>About</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->about}}</td>
                        <td>
                          <img src="{{asset('uploadImg/profileImg').'/'.$user->profile_image}}" width="100">
                        </td>
                        <td>
                          <a onclick="return confirm('Are you sure you want to delete data')" href="" class="btn btn-danger">Delete</a>
                        </td>
                       
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>



@endsection('content')