@extends('main')
<?php $username = htmlspecialchars($user->uname); ?>
@section('title', "| $username")

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                  <h1>About {{ $user->uname }}</h1>
                  <p class="lead">Here is a description about {{ $user->uname }}...</p>
                   @if(DB::table('follows')->where('follower','=', Auth::user()->uid)->where('followee','=', $user->uid)->count() != 1)
              		<div class="col-md-6">
                		<a href="{{ route('follow.store', $user->uid)}}" class="btn btn-warning btn-block">Follow</a>
              		</div>
          			@else
            		<div class="col-md-6">
            		 {{ Form::open(['route' => ['follow.destroy', $user->uid], 'method' => 'DELETE']) }}
						{{ Form::submit('Unfollow', ['class' => 'btn btn-warning btn-block']) }}
					{{ Form::close() }}
            		</div>
          			@endif
                </div>
            </div>
        </div> <!-- end of header .row -->
<h3>His/Her Projects</h3>
<hr>

		<div class="row">
			<div class="col-sm-6 col-md-4">
			@foreach(DB::table('projects')->where('user_uid', '=', $user->uid)->get() as $project)
				<div class="thumbnail">
					<img src="{{asset('/images/' . $project->sample)}}" alt=""> <!-- need to be fixed -->
					<div class="caption">
						<h3>{{ $project->pname }}</h3>
						<p>{{ substr(strip_tags($project->description), 0, 70) }}{{ strlen(strip_tags($project->description)) > 70 ? "..." : "" }}</p>
						<p><a href="{{ route('project.show', $project->pid) }}" class="btn btn-success" role="button">View</a></p>
					</div>
				</div>
			@endforeach	
			</div>
		</div>


@stop