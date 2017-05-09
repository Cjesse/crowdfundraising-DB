@extends('main')

@section('title', "| $tag->name Tag")

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $tag->name }} Tag <small>{{ $tag->project()->count() }} Projects</small></h1>
		</div>
{{-- 		<div class="col-md-2">
			<a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top:20px;">Edit</a>
		</div>
		<div class="col-md-2">
			{{ Form::open(['route' => ['tag.destroy', $tag->id], 'method' => 'DELETE']) }}
				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px;']) }}
			{{ Form::close() }}
		</div>
 --}}	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>Project</th>
						<th>Tags</th>
						<th>View</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($tag->project as $project)
					<tr>
						<td>{{ $project->pname }}</td>
						<td>@foreach ($project->tag as $tag)
								<span class="label label-default">{{ $tag->content }}</span>
							@endforeach
							</td>
						<td><a href="{{ route('project.show', $project->pid ) }}" class="btn btn-default btn-xs">View</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection