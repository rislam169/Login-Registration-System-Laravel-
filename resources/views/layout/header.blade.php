</!DOCTYPE html>
<html>
<head>
	<title>Login Register System</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
	<style type="text/css">
		a{
			color: black;
		}
		.bg-light {
		    background-color: #F2F2F2!important;
		}
		#name-error, #username-error, #email-error, #password-error, #confirm_password-error{
			color:red;
			font-size: 14px;
			font-family: serif;	
		}
	</style>
</head>
<body>
	<div class="container">
		<nav class="navbar bg-light navbar-default" style="margin-bottom: 30px; font-color: black;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="{{ url('index') }}">Login Register System</a>
				</div>
				<ul class="nav justify-content-center pull-right">
					@if(Session::get('login') == true)
						<li class="nav-item btn btn-light btn-sm"><a class="nav-link" href="{{ url('profile/'.Session::get('id')) }}">Profile</a></li>
						<li class="nav-item btn btn-light btn-sm"><a class="nav-link" href="{{ url('logout') }}">Logout</a></li>
					@endif
					@if(Session::get('adminlogin') == true)	
						<li class="nav-item btn btn-light btn-sm"><a class="nav-link" href="{{ url('index') }}">Home</a></li>
						<li class="nav-item btn btn-light btn-sm"><a class="nav-link" href="{{ url('addAdmin') }}">Add Admin</a></li>
						<li class="nav-item btn btn-light btn-sm"><a onclick="return confirm('Are you sure to remove your account!')" class="nav-link" href="{{ url('removeAccount') }}">Remove Account</a></li>
						<li class="nav-item btn btn-light btn-sm"><a class="nav-link" href="{{ url('logout') }}">Logout</a></li>
					@endif

					@if(Session::get('login') == false && Session::get('adminlogin') == false)
						<li class="nav-item btn btn-light btn-sm"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
						<li class="nav-item btn btn-light btn-sm"><a class="nav-link" href="{{ url('register') }}">Register</a></li>
						<li class="nav-item btn btn-light btn-sm"><a class="nav-link" href="{{ url('adminLogin') }}">Admin Login</a></li>
					@endif
				</ul>
			</div>
			@if(session()->has('success-message'))
			    <div class="alert alert-success">
			        {{ session()->get('success-message') }}
			    </div>
			@endif
			@if(session()->has('danger-message'))
			    <div class="alert alert-danger">
			        {{ session()->get('danger-message') }}
			    </div>
			@endif
			
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
		</nav>