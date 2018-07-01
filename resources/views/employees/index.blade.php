@extends('layouts.master')

@section('EmployeesList')
	<h3>All Employees</h3>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
	  Add Employee
	</button>

	<table class="table table-responsive">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Modify</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				@foreach($employee as $emp)
				<td>{{$emp->first_name}}</td>
				<td>{{$emp->last_name}}</td>
				<td>{{$emp->email}}</td>
				<td>{{$emp->phone}}</td>
				<td>Edit / Delete</td>
				@endforeach
			</tr>
		</tbody>
	</table>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">New Employee</h4>
	      </div>
	      <form action="{{route('employees.store')}}" method="post">
	      	{{csrf_field()}}
		      <div class="modal-body">
		      	<div class="form-group">
		      		<label for="title">First Name</label>
		      		<input type="text" class="form-control" name="first_name" id="first_name">
		      	</div>
		      	<div class="form-group">
		      		<label for="title">Last Name</label>
		      		<input type="text" class="form-control" name="last_name" id="last_name">
		      	</div>
		      	<div class="form-group">
		      		<label for="title">Email</label>
		      		<input type="text" class="form-control" name="email" id="email">
		      	</div>
		      	<div class="form-group">
		      		<label for="title">Phone</label>
		      		<input type="text" class="form-control" name="website" id="website">
		      	</div>


		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

@endsection