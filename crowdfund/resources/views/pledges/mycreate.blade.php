@extends('main')

@section('title', '| Pledge')

@section('stylesheet')
	{!!	Html::style('css/parsley.css') !!}
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Pledge Project{{ $project->pname}}</h1>
		{!! Form::open(['route' => ['pledge.mystore',$project->pid],'method' => 'post', 'data-parsley-validate' => '']) !!}
{{-- 			<div class="input-group">
				{{ Form::label('pid', 'Project id') }}
					{{ Form::text('pid', $project->pid, array('class' => 'form-control', 'required' => '')) }}
			</div>
 --}}
 			<p></p>
			<div class="input-group">
				{{ Form::label('amount', 'Amount:') }}
					{{ Form::number('amount', null, array('class' => 'form-control', 'required' => '')) }}
			</div>
			<p></p>
			<div class="input-group">
				{{ Form::label('CCN', 'Your Card:') }}
					{{ Form::select('CCN', $CCNs) }}
			</div>
			<p></p>
				{{ Form::submit('Pledge', array('class' => 'btn btn-success', 'style' => 'margin-top: 20px')) }}
				<a href="{{ route('project.show',$project->pid)}}" class="btn btn-danger", style="margin-top: 20px;">Cancel</a>
		{!! Form::close() !!}
		</div>
	</div>

@endsection