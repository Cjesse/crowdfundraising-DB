@extends('main')

@section('title', '| Results of Projects')

@section('content')
	<div class="row">

		<div class="col-md-10">
			<h1>Projects containing "{{ \Request::get('search') }}"</h1>
		</div>
		<div class="col-md-12">
			<hr>
		</div>

	</div><!--end of the row-->
	<div class="container">
        <div class="row">
        @foreach($projects as $project)
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
            <div class="caption">
                <div class="card">
                    <img class="card-img-top" src="http://localhost:8000/project/{{ $project->pid }}/image">
                    <div class="card-block">
                        <figure class="profile">
                            <img src="http://success-at-work.com/wp-content/uploads/2015/04/free-stock-photos.gif" class="profile-avatar" alt="">
                        </figure>
                        <h4 class="card-title mt-3">{{ $project->pname }}</h4>
                        <div class="meta">
                            <a>{{ $project->category }}</a>
                        </div>
                        <div class="card-text">
                            {{ substr(strip_tags($project->description), 0, 70) }}{{ strlen(strip_tags($project->description)) > 70 ? "..." : "" }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <small>Last updated {{ (strtotime(date('Y-m-d H:i:s'))-strtotime($project->updated_at)) > 86400 ? (strtotime(date('Y-m-d H:i:s'))-strtotime($project->updated_at))/86400 . " days" : (strtotime(date('Y-m-d H:i:s'))-strtotime($project->updated_at))/60 . " mins" }} ago</small>
                        <a href="{{ route('project.show', $project->pid) }}" class="btn btn-secondary float-right btn-sm" role="button">View</a>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
@endsection
