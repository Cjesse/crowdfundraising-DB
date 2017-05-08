@extends('main')

@section('title', '| My HomePage')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                  <h1>Recommended to You</h1>
                  <p class="lead">Here are the recommedations based on your interests...</p>
                </div>
            </div>
        </div> <!-- end of header .row -->
<h3>My Project</h3>
<hr>

		<div class="row">
			<div class="col-sm-6 col-md-4">
			@foreach(Auth::user()->project as $project)
				<div class="thumbnail">
					<img src="{{ $project->sample}}" alt="">
					<div class="caption">
						<h3>{{ $project->pname }}</h3>
						<p>{{ $project->description }}</p>
						<p><a href="#" class="btn btn-primary" role="button">View</a> <a href="#" class="btn btn-default" role="button">Update</a></p>
					</div>
				</div>
			@endforeach	
			</div>
		</div>

@stop