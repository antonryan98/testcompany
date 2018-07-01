@extends('layouts.master')

@section('CompaniesList')
	<h3>All Companies</h3>
	<!-- Button trigger modal -->

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
	  Add Company
	</button>

	<table class="table table-responsive">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Logo</th>
				<th>Website</th>
				<th>Modify</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				@foreach($company as $com)
				<td>{{$com->name}}</td>
				<td>{{$com->email}}</td>
				<td>Logo</td>
				<td>{{$com->website}}</td>
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
	        <h4 class="modal-title" id="myModalLabel">New Company</h4>
	      </div>
	      <form action="{{route('companies.store')}}" method="post">
	      	{{csrf_field()}}
		      <div class="modal-body">
		      	<div class="form-group">
		      		<label for="title">Name</label>
		      		<input type="text" class="form-control" name="name" id="name">
		      	</div>
		      	<div class="form-group">
		      		<label for="title">Email</label>
		      		<input type="text" class="form-control" name="email" id="email">
		      	</div>
		      	<div class="form-group">
		      		<label for="title">Website</label>
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