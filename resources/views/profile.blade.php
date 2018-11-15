@include('layout.header')
<style type="text/css">
	.error-label {
	    color: red;
	    font-size: 15px;
	    font-family: serif;
	}
</style>
<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>User Profile <span class="float-right"><a href="{{ url('index') }}" class="btn btn-primary">Back</a></span></h2>
			</div>
			<div class="card-body">
				<!-- Tab navigation -->
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="home" aria-selected="true">Personal Profile</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Educational information</a>
				  </li>
				</ul>
				<!-- Tab navigation end -->
				<!-- Tab Content -->
				<div class="tab-content" id="myTabContent">
					<!-- Personal information content -->
				  <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="home-tab">
				  	<form enctype="multipart/form-data" method="POST" action="{{ url('update') }}">
					  	<div style="width: 35%;height: 600px; float: left;margin-top: 30px;">
					  		<h4>Profile Image</h4>
					  		<div class="text-center" style="margin-top:30px;margin-bottom: 50px;">
					  			<img src="{{asset('uploads/avatars/'.$data->details->avatar)}}" class="rounded-circle img-fluid" height="300" width="300">
					  			
					  		</div>
					  		<div class="form-group">
								<label for="image">Update Image</label>
								<input type="file" name="image" id="image" class="form-control" style="padding-bottom: 35px;">
							</div>
					  		
					  	</div>
				  		<div style="width: 60%; float: right;margin-top: 30px;padding-left: 30px">
				  			<h4>Profile Info</h4>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="hidden" name="id" id="id" class="form-control" value="{{$data->id}}">
							<div class="form-group">
								<label for="name">Your Name</label>
								<input type="text" name="name" id="name" class="form-control" value="{{$data->name}}">
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" id="username" class="form-control" value="{{$data->username}}">
							</div>
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="text" name="email" id="email" class="form-control" value="{{$data->email}}">
								<p id="emailstatus"></p>
							</div>
							<div class="form-group">
								<label for="fname">Father Name</label>
								<input type="text" name="fname" id="fname" class="form-control" value="{{$data->details->father_name}}">
							</div>
							<div class="form-group">
								<label for="mname">Mother Name</label>
								<input type="text" name="mname" id="mname" class="form-control" value="{{$data->details->mother_name}}">
							</div>
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" name="address" id="address" class="form-control" value="{{$data->details->address}}">
							</div>
							<div class="form-group">
								<label for="mobile">Mobile No</label>
								<input type="text" name="mobile" id="mobile" class="form-control" value="{{$data->details->mobile}}">
							</div>
							@if($data->id == Session::get('id') || Session::get('adminlogin') == true)
								<button type="submit" name="update" class="btn btn-success">Update</button>
								<a class="btn btn-info" href="{{ url('changepass') }}">Change Password</a>
							@endif
						
						</div>
					</form>
				  </div>
				  <!-- Personal information content end -->
				  <!-- Educational Information content -->
				  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				  	<div style="max-width: 1000px; margin: 0 auto;">
						<table id="educationTable" class="table table-striped">
							<thead>
								<tr>
									<th>Degree</th>
									<th>Degree Name</th>
									<th>Institute</th>
									<th>University/Board</th>
									<th>Passing Year</th>
									<th>Duration</th>
									<th>Marks/CGPA</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data->education as $key => $value)
									<tr id="rowid{{$value->id}}">    
										<td>{{$value->degree}}</td>
										<td>{{$value->degree_name}}</td>
										<td>{{$value->institute}}</td>
										<td>{{$value->board}}</td>
										<td>{{$value->passing_year}}</td>
										<td>{{$value->duration}}</td>
										<td>{{$value->gpa}}</td>
										<td>
											
											<button data-id="{{$value->id}}" class="btn btn-warning deleducation">Remove</button>
											<!-- onclick="return confirm('Are you sure to delete?')" -->
										</td>                 
									</tr>
								@endforeach
							</tbody>
						</table>	
					</div>
					<div class="text-center">
						<a href="#exampleModal" data-target=".bd-example-modal-lg" data-toggle="modal" class="btn btn-success">Add Education</a>
					</div>
				  </div>
				  <!-- Add education modal -->
					<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Educational Information</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form id="educationForm" method="POST" action="">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<input type="hidden" name="id" id="id" class="form-control" value="{{$data->id}}">
												<input type="hidden" name="_token" value="{{csrf_token()}}">
												<small>Required Field*</small>
												<div class="form-group">
													<label for="degree">Degree*</label>
													<input type="text" name="degree" id="degree" class="form-control" placeholder="e.g. SSC">
												</div>
												<div class="form-group">
													<label for="degreename">Degree Name</label>
													<input type="text" name="degreename" id="degreename" class="form-control" placeholder="e.g. Secondary School Certificate">
												</div>
												<div class="form-group">
													<label for="institute">Institute*</label>
													<input type="text" name="institute" id="institute" class="form-control">
													<p id="emailstatus"></p>
												</div>
												<div class="form-group">
													<label for="board">University/Board</label>
													<input type="text" name="board" id="board" class="form-control" placeholder="e.g. Dhaka">
													<p id="emailstatus"></p>
												</div>
											</div>
											<div class="col-md-6 ml-auto">
												<div class="form-group">
													<label for="passyear">Passing Year*</label>
													<input type="number" min="1950" max="{{date('Y')}}" name="passyear" id="passyear" class="form-control" placeholder="e.g. 2018">
												</div>
												<div class="form-group">
													<label for="duration">Duration</label>
													<input type="number" name="duration" id="duration" class="form-control">
												</div>
												<div class="form-group">
													<label for="gpa">Marks/CGPA*</label>
													<input type="text" name="gpa" id="gpa" class="form-control" placeholder="e.g. 4.50">
													<p id="emailstatus"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" name="submit" class="btn btn-primary" id="edusubmit">Save Education</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- Add education modal -->
					<!-- Delete education confirm modal -->
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="del-modal">
				  <div class="modal-dialog modal-sm">
				    <div class="modal-content">
				      <div class="modal-header">
				        
				        <h4 class="modal-title" id="myModalLabel">Are you confirm?</h4>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" id="modal-btn-no">No</button>
				        <button type="button" class="btn btn-primary" id="modal-btn-yes">Yes</button>
				      </div>
				    </div>
				  </div>
				</div>
					<!-- Delete education confirm modal end -->
				  <!-- Educational Information content end -->
				</div>
				<!-- Tab Content end -->	
			</div>
		</div>


<script type="text/javascript">

	// Email validation on profile update
	$(document).ready(function (){
		$('#email').blur(function(){
			var email = $(this).val();
			var id = $('#id').val();
			// console.log(checkerror);
			if(email != ''){
					var url   = "{{url('checkmailforupdate')}}";
					var token = "{!!csrf_token()!!}"; 
					$.ajax({
						url:url, 
			            method:"POST",
			            data:{'email':email, 'id':id, '_token':token},
			            dataType:"json",
			            cache: false,
			            success:function(data)
			            {
			            	// console.log(data.success);
			            	// alert(data);
				             if(data.success == true){
				             	// console.log('ok');
				             	$('#emailstatus').text("Email Available!");
				             	$('#emailstatus').css("color","green");
				             	$('#emailstatus').css("font-size","14px");
				             	$('#emailstatus').css("font-family","serif");
				             	$('#register').unbind('click');
				             }
				             else{
				             	// alert('else');
				             	$('#emailstatus').text("Email already in database!");
				             	$('#emailstatus').css("color","red");
				             	$('#emailstatus').css("font-size","14px");
				             	$('#emailstatus').css("font-family","serif");
				             	$("#register").on('click', function (e) {
								   e.preventDefault();
								});

				             }
						}
					});
			}else{
				$('#emailstatus').text("");
			}			
		});

		// Education form validate
		
		   
	

		$("#educationForm").validate({
			debug: false,
		    errorClass: "error-label",
		    errorElement: "span",
			rules: {
				degree: {
					required: true
				},
				institute: {
					required: true
				},
				passyear: {
					required: true
				},
				gpa: {
					required: true
				},
			},
			messages: {
				degree: {
					required: "Please enter your degree"
				},
				institute: {
					required: "Please enter institute name"
				},
				passyear: {
					required: "Please provide passing year"
				},
				gpa: {
					required: "Please provide your result"
				},
			}
		});

		// Educationational Information update
		 $('#edusubmit').on('click', function () {
			$("#educationForm").validate();
		      if ($("#educationForm").valid()) 
		      { 
				var student_id = $('#id').val();
		        var degree = $('#degree').val();
		        var degreename = $('#degreename').val();
		        var institute = $('#institute').val();
		        var board = $('#board').val();
		        var passyear = $('#passyear').val();
		        var duration = $('#duration').val();
		        var gpa = $('#gpa').val();
		        var url   = "{{url('saveeducation')}}";
		        var token = "{!!csrf_token()!!}";
		         $.ajax({
		            url:url, 
		            method:"POST",
		            data:{'student_id':student_id,'degree':degree,'degreename': degreename,'institute': institute,'board': board,'passyear': passyear,'duration': duration,'gpa': gpa,'_token':token},
		            dataType:"json",
		            success:function(data){
		              if(data.success == true){
		              	//console.log(data);
		              	$('#exampleModal').modal('hide');

		              	$("#educationTable > tbody").prepend('<tr><td>'+degree+'</td><td>'+degreename+'</td><td>'+institute+'</td><td>'+board+'</td><td>'+passyear+'</td><td>'+duration+'</td><td>'+gpa+'</td><td><button class="btn btn-warning">Remove</button></td></tr>');
		              }else{
		              	alert('This educational infomation already added. Try New!');
		              }

		          	}		
		       	});
		      } 
		      else 
		      { 
		        
		      }

	     });

	    // Delete Education Information
	    var delId;
		$(".deleducation").on("click", function(){
			delId =  $(this).data('id');
		});


	    var modalConfirm = function(callback){
  
		  $(".deleducation").on("click", function(){
		    $("#del-modal").modal('show');
		  });

		  $("#modal-btn-yes").on("click", function(){
		    callback(true);
		    $("#del-modal").modal('hide');
		  });
		  
		  $("#modal-btn-no").on("click", function(){
		    callback(false);
		    $("#del-modal").modal('hide');
		  });
		};

		modalConfirm(function(confirm){
		  if(confirm){
		  	// Delete after confirmation.
		  	//console.log(delId);

		  	var id = $(this).data('id');
		    	var url   = "{{ url('deleducation') }}";
		    	var token = "{!!csrf_token()!!}";
		    	$.ajax({
		            url:url, 
		            method:"POST",
		            data:{'id':delId, '_token':token},
		            dataType:"json",
		            success:function(data){
		              if(data.success == true){
		            	$('#rowid'+delId).remove();
		              }else{
		              	alert('Not deleted');
		              }
		          	}		
		       	});
		  }
		});


    });


</script>
@include('layout.footer')