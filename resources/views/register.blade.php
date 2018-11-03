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
							<p id="namestatus"></p>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" class="form-control">
							<p id="usernamestatus"></p>
						</div>
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="text" name="email" id="email" class="form-control">
							<p id="emailstatus"></p>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control">
							<p id="passwordstatus"></p>
						</div>
						<button type="submit" name="register" class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>

<script type="text/javascript">

		// $(document).ready(function (){

		// 	$('#registerForm').submit(function(e) {
		// 	    e.preventDefault();
		// 	    var name = $('#name').val();
		// 	    var username = $('#username').val();
		// 	    var email = $('#email').val();
		// 	    var password = $('#password').val();
			 
		// 	    $(".error").remove();
			 
		// 	    if (name.length < 1) {
		// 	      $('#name').after('<span class="error">This field is required</span>');
		// 	    }
		// 	    if (username.length < 1) {
		// 	      $('#username').after('<span class="error">This field is required</span>');
		// 	    }
		// 	    if (email.length < 1) {
		// 	      $('#email').after('<span class="error">This field is required</span>');
		// 	    } else {
		// 	      var regEx = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
		// 	      var validEmail = regEx.test(email);
		// 	      if (!validEmail) {
		// 	        $('#email').after('<span class="error">Enter a valid email</span>');
		// 	      }
		// 	    }
		// 	    if (password.length < 4 || password.length > 8) {
		// 	      $('#password').after('<span class="error">Password must be between 4 to 8</span>');
		// 	    }
		// 	});






















			// $('#name').blur(function(){
			// 	var name = $(this).val();
			// 	if(name == ''){
			// 		$('#namestatus').text("Name field must not empty!");
			// 		$('#namestatus').css("color","red");
			// 	}else{
			// 		$('#namestatus').text("");
			// 	}			
			// });

			// $('#username').blur(function(){
			// 	var username = $(this).val();
			// 	if(username == ''){
			// 		$('#usernamestatus').text("Username field must not empty!");
			// 		$('#usernamestatus').css("color","red");
			// 	}else{
			// 		$('#usernamestatus').text("");
			// 	}		
			// });

			// $('#email').blur(function(){
			// 	var email = $(this).val();
			// 	if(email == ''){
			// 		$('#emailstatus').text("Email field must not empty!");
			// 		$('#emailstatus').css("color","red");
			// 	}else{
			// 		$('#email').blur(function(){
			// 			var email = $(this).val();
			// 			var url   = "{{url('checkmail')}}";
			// 			var token = "{!!csrf_token()!!}"; 
			// 			$.ajax({
			// 				url:url, 
			// 	            method:"POST",
			// 	            data:{'email':email,'_token':token},
			// 	            dataType:"json",
			// 	            cache: false,
			// 	            success:function(data)
			// 	            {
			// 	            	// console.log(data.success);
			// 	            	// alert(data);
			// 		             if(data.success == true){
			// 		             	// console.log('ok');
			// 		             	$('#emailstatus').text("Email Available!");
			// 		             	$('#emailstatus').css("color","green");
			// 		             }else{
			// 		             	// alert('else');
			// 		             	$('#emailstatus').text("Email Already Exist!");
			// 		             	$('#emailstatus').css("color","red");
			// 		             }
			// 				}
			// 			});
			// 		});
			// 	}			
			// });

			// $('#password').blur(function(){
			// 	var password = $(this).val();
			// 	if(password == ''){
			// 		$('#passwordstatus').text("Passwor field must not empty!");
			// 		$('#passwordstatus').css("color","red");
			// 	}else{
			// 		$('#passwordstatus').text("");
			// 	}			
			// });


		});


		



		// $('.delete_user').on('click',function(arguments) {
  //       var user_id    = $(this).attr('user-id');
  //       var section_id = $(this).attr('section-id');
  //       var url        = "{{url('workflow/section/notified-user-delete')}}"; 
  //       var token = "{!!csrf_token()!!}";
  //        $.ajax({
  //           url:url, 
  //           method:"POST",
  //           data:{'section_id':section_id,'user_id': user_id,'_token':token},
  //           dataType:"json",
  //           success:function(data){
  //             if(data.status == 'success'){
  //                $('#user_section_'+section_id+'_'+user_id).hide();
  //             }
  //         }
  //      });
  //    });

</script>
@include('layout.footer')