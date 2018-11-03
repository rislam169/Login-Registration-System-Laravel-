@include('layout.header')
		<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>User List <span class="float-right">Welcome! <strong>
				</strong>{{Session::get('username')}}</span></h2>
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<tr>
						<th>Serial</th>
						<th>Name</th>
						<th>Username</th>
						<th>Email Address</th>
						@if(Session::get('adminlogin') == true)	
							<th>Action</th>
						@endif
					</tr>
					@foreach($data as $key => $value)
						<tr>    
							<td>{{++$key}}</td>
							<td>{{$value->name}}</td>
							<td>{{$value->username}}</td>
							<td>{{$value->email}}</td>
							<!-- <a class="btn btn-primary" href="{{ url('profile/'.$value->id) }}">View</a> -->
							@if(Session::get('adminlogin') == true)
								<td>
									<a class="btn btn-primary" href="{{ url('profile/'.$value->id) }}">View</a>
									<a onclick="return confirm('Are you sure to delete?')" class="btn btn-warning" href="{{ url('delprofile/'.$value->id) }}">Remove</a>
								</td> 
							@endif
							                
						</tr>
					@endforeach
				</table>
			</div>
		</div>
@include('layout.footer')