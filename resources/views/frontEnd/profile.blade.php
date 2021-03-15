@extends('frontEnd.frontLayout')

@section("content")


<br>
<br>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
		@if($errors)
      		@foreach($errors->all() as $err)
      			<p class="text-danger">{{$err}}</p>
      		@endforeach
	    @endif

	    @if(Session::has("success"))
	      		<p class="alert alert-success">{{session('success')}}</p>
	     @endif
			<div class="cardd">
				<h2 style="text-align:center">Profile Details</h2>
				  <img src="{{asset('uploadImg/profileImg/'.$user->profile_image)}}" alt="img" style="width:30%">
					<br>
					<br>
				  <h1>{{$user->name}}</h1>
				  <h4>{{$user->email}}</h4>
				  <p class="title">{{$user->about}}</p>
				  <div style="margin: 24px 0;">
				    <a href="#"><i class="fa fa-twitter"></i></a>  
				    <a href="#"><i class="fa fa-facebook"></i></a> 
				  </div>

				  <div class="row">
				  	 <button id="myBtn2">Update Profile</button>
				  	 <button id="myBtn">Post Blog</button>
				  </div>
				  
			</div>
		</div>
	</div>
</div>

<br>
<br>


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="table-resposive">
        <h3>User Created Post</h3>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tbody>
                <thead>
                  @if(count($user->post) > 0) 
                    <tr>
                      <th>#</th>
                       <!-- <th>Category</th> -->
                      <th>Title</th>
                      <th>Body</th>
                      <th>Image</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   
                      @foreach($user->post as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>
                          <img src="{{asset('uploadImg/post').'/'.$post->image}}" width="100">
                        </td>
                        <td>
                          <a href="" class="btn btn-success">Update</a>
                          <!-- <a onclick="return confirm('Are you sure you want to delete data')" href="" class="btn btn-danger">Delete</a> -->
                        </td>
                    </tr>
                    @endforeach

                    @else
                    <tr>
                      <td><p>NO Post yet</p></td>
                    </tr>
                  @endif
                  </tbody>
              </tbody>
          </table>
      </div>
    </div>
  </div>
</div>


<!-- the update profile modal -->
<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close2">&times;</span>
    <div class="table-resposive">
    	
    	<form method="POST" action="{{url('/profile')}}" enctype="multipart/form-data">
    		@csrf
        <input type="hidden" name="id" value="{{$user->id}}">
    		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    			<tbody>
                    <tr>
                    	<td>Name</td>
                        <td><input type="text" name="name" value="{{$user->name}}" class="form-control"></td>
                    </tr>
                    <tr>
                    	<td>Email</td>
                        <td><input type="text" value="{{$user->email}}" name="" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>About</td>
                         <td><textarea name="about" class="form-control">{{$user->about}}</textarea></td>
                    </tr>
                    <tr>
                    	<td>Profile Image</span></td>
                      <input type="hidden" name="profile_image" value="{{$user->profile_image}}">
                    	<td><input type="file" name="profile_image"  class="form-control"></td>
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




<!-- The Post Blog Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="table-resposive">
    	
    	<form method="POST" action="{{url('/profile')}}" enctype="multipart/form-data">
    		@csrf
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
                        <td><input type="text" name="title" class="form-control"></td>
                    </tr>
                    <tr>
                    	<td>Body <span style="color: red">*</span></td>
                         <td><textarea name="body" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                    	<td>Image <span style="color: red">*</span></td>
                    	<td><input type="file" name="post_image" class="form-control"></td>
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


	
<style>

.cardd {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 700px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 30%;
  font-size: 18px;
}

/*a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}*/

button:hover, a:hover {
  opacity: 0.7;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
/* The Close Button */
.close2 {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close2:hover,
.close2:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


<script>
// Get the modal
var modal2 = document.getElementById("myModal2");

// Get the button that opens the modal
var btn = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}
</script>




@endsection("content")