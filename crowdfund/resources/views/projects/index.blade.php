@extends('main')

@section('looginorsignup')
	<ul class="nav navbar-nav navbar-right">
        <li>
          <a href="/login">
          <span class="glyphicon glyphicon-off" aria-hidden="true">
          Log in
          </span>
          </a>
        </li>
        <li><a href="/signup">Sign up</a></li>
      </ul>
@endsection

@section('content')
	<div class="row">

		<div class="col-md-10">
			<h1>All Projects</h1>
		</div>
		<div class="col-md-12">
			<hr>
		</div>

	</div><!--end of the row-->
	
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>Project Name</th>
					<th>Project Owner</th>
					<th>Description</th>
					<th>Category</th>
					<th>Enddate</th>
					<th>Deadline</th>
					<th>Funded</th>
				</thead>
				<tbody>
				@foreach($projects as $project)
					<tr>
						<th>{{ $project->pname }}</th>
						<td>{{  }}</td>

					</tr>
				</tbody>
			</table>
		</div>

	</div>
@endsection