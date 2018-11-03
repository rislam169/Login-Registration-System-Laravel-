@include('layout.header')

<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>User Profile <span class="float-right"><a href="{{ url('index') }}" class="btn btn-primary">Back</a></span></h2>
			</div>
			<div class="card-body">
				<div style="max-width: 600px; margin: 0 auto;">
					<form method="POST" action="{{ url('update') }}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
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
						</div>
						@if($data->id == Session::get('id'))
							<button type="submit" name="update" class="btn btn-success">Update</button>
							<a class="btn btn-info" href="{{ url('changepass') }}">Change Password</a>
						@endif
					</form>
				</div>
			</div>
		</div>

@include('layout.footer')