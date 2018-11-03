@include('layout.header')

<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>User Profile <span class="float-right"><a href="{{ url('index') }}" class="btn btn-primary">Back</a></span></h2>
			</div>
			<div class="card-body">
				<div style="max-width: 600px; margin: 0 auto;">
					<form method="POST" action="{{ url('updatepass') }}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label for="name">Old Password</label>
							<input type="password" name="oldpass" id="name" class="form-control" placeholder="Enter your old password" ">
						</div>
						<div class="form-group">
							<label for="username">New Password</label>
							<input type="password" name="newpass" id="username" class="form-control" placeholder="Enter your new password" ">
						</div>
							<button type="submit" name="update" class="btn btn-success">Update</button>
					</form>
				</div>
			</div>
		</div>

@include('layout.footer')