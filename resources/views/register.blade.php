@include('layout.header')

		<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>User Registration </h2>
			</div>
			<div class="card-body">
				<div style="max-width: 600px; margin: 0 auto;">
				<form id="registerForm" method="POST" action="{{ url('regs') }}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label for="name">Your Name</label>
							<input type="text" name="name" id="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="email" name="email" id="email" class="form-control">
							<p id="emailstatus"></p>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Confirm Password</label>
							<input type="password" name="confirm_password" id="confirm_password" class="form-control">
						</div>
						<button type="submit" name="register" class="btn btn-success" id="register">Submit</button>
					</form>
				</div>
			</div>
		</div>

<script type="text/javascript">

	 $(document).ready(function (){

		$("#registerForm").validate({
			rules: {
				name: {
					required: true,
					minlength: 3
				},
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 4
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
			},
			messages: {
				username: {
					required: "Please enter a name",
					minlength: "Your username must consist of at least 3 characters"
				},
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 4 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address"
			}
		});


		$('#email').blur(function(){
			var email = $(this).val();
			var checkerror = $('#email-error').html();
			// console.log(checkerror);
			if((email != '' && checkerror == '') || (email != '' && checkerror == null)){
					var url   = "{{url('checkmail')}}";
					var token = "{!!csrf_token()!!}"; 
					$.ajax({
						url:url, 
			            method:"POST",
			            data:{'email':email,'_token':token},
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
				             }else{
				             	// alert('else');
				             	$('#emailstatus').text("Email already been taken!");
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

		$('#email').keyup(function(){
			var email = $(this).val();
			var checkerror = $('#email-error').html();
			if(email == '' || checkerror != null){
				$('#emailstatus').text("");
			}
		});

	});

</script>
@include('layout.footer')