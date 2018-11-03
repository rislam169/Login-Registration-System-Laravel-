@include('layout.header')

		<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>Admin Registration </h2>
			</div>
			<div class="card-body">
				<div style="max-width: 600px; margin: 0 auto;">
				<form method="POST" action="{{ url('adminregs') }}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
						</div>
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="text" name="email" id="email" class="form-control" placeholder="Enter Email Address">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
						</div>
						<button type="submit" name="register" class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>

@include('layout.footer')