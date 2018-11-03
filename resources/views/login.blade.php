@include('layout.header')		
		<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>User Login </h2>
			</div>
			<div class="card-body">
				<div style="max-width: 600px; margin: 0 auto;">
					<form method="POST" action="{{ url('logs') }}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="text" name="email" id="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control">
						</div>
						<button type="submit" name="login" class="btn btn-success">Log in</button>
					</form>
				</div>
			</div>
		</div>
@include('layout.footer')