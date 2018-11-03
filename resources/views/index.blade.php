@include('layout.header')
		<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>User List <span class="float-right">Welcome! <strong>
				</strong>{{Session::get('username')}}</span></h2>
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<tr>
						<th width="20%">Serial</th>
						<th width="20%">Name</th>
						<th width="20%">Username</th>
						<th width="20%">Email Address</th>
						<th width="20%">Action</th>
					</tr>
					@foreach($data as $key => $value)
						<tr>    
							<td>{{++$key}}</td>
							<td>{{$value->name}}</td>
							<td>{{$value->username}}</td>
							<td>{{$value->email}}</td>
							<td>
							<a class="btn btn-primary" href="{{ url('profile/'.$value->id) }}">View</a>
							@if(Session::get('adminlogin') == true)	
								<a onclick="return confirm('Are you sure to delete?')" class="btn btn-warning" href="{{ url('delprofile/'.$value->id) }}">Remove</a>
							@endif
							</td>                 
						</tr>
					@endforeach
				</table>
			</div>
		</div>
@include('layout.footer')