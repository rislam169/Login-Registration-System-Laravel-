@include('layout.header')

		<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>User Registration </h2>
			</div>
			<div class="card-body">
				<div style="max-width: 600px; margin: 0 auto;">
				<form method="POST" action="{{ url('regs') }}">
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
							<input type="text" name="email" id="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control">
						</div>
						<button type="submit" name="register" class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>

@include('layout.footer')