@include('layout.header')

<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>User Profile <span class="float-right"><a href="{{ url('index') }}" class="btn btn-primary">Back</a></span></h2>
			</div>
			<div class="card-body">
				<div style="max-width: 600px; margin: 0 auto;">
					<form method="POST" action="{{ url('update') }}">
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
						</div>
						<div class="form-group">
							<label for="email">Father Name</label>
							<input type="text" name="fname" id="fname" class="form-control" value="{{$data->details->father_name}}">
						</div>
						<div class="form-group">
							<label for="email">Mother Name</label>
							<input type="text" name="mname" id="mname" class="form-control" value="{{$data->details->mother_name}}">
						</div>
						<div class="form-group">
							<label for="email">Address</label>
							<input type="text" name="address" id="address" class="form-control" value="{{$data->details->address}}">
						</div>
						<div class="form-group">
							<label for="email">Mobile No</label>
							<input type="text" name="mobile" id="mobile" class="form-control" value="{{$data->details->mobile}}">
						</div>
						@if($data->id == Session::get('id') || Session::get('adminlogin') == true)
							<button type="submit" name="update" class="btn btn-success">Update</button>
							<a class="btn btn-info" href="{{ url('changepass') }}">Change Password</a>
						@endif
					</form>
				</div>
			</div>
		</div>

@include('layout.footer')