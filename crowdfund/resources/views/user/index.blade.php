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
<h3>My Projects</h3>
<hr>

		<div class="row">
			<div class="col-sm-6 col-md-4">
			@foreach(Auth::user()->project as $project)
				<div class="thumbnail">
					<img src="{{asset('/images/' . $project->sample)}}" alt=""> <!-- need to be fixed -->
					<div class="caption">
						<h3>{{ $project->pname }}</h3>
						<p>{{ substr(strip_tags($project->description), 0, 70) }}{{ strlen(strip_tags($project->description)) > 70 ? "..." : "" }}</p>
						<p><a href="{{ route('project.show', $project->pid) }}" class="btn btn-success" role="button">View</a> <a href="{{ route('project.update', $project->pid) }}" class="btn btn-info" role="button">Update</a></p>
					</div>
				</div>
			@endforeach	
			</div>
		</div>
<hr>
<h3>Recent Posts</h3>

<hr>
<h3>Recent Comments</h3>
<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="http://placekitten.com/45/45" alt="">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">Test comments on Project 1</h4>
    This project is great...
  </div>
</div>


@stop