@extends('main')

@section('title', '| Pledge')

@section('stylesheet')
	{!!	Html::style('css/parsley.css') !!}
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Pledge Project{{ $project->pname}}</h1>
		{!! Form::open(array('route' => 'pledge.store', 'data-parsley-validate' => '')) !!}
			<div class="input-group">
				{{ Form::label('pid', 'Project id') }}
<<<<<<< Updated upstream
					{{ Form::text('pid', $project->pid, array('class' => 'form-control', 'required' => '','id'=>'disabledInput')) }}
=======
					{{ Form::text('pid', $project->pid, array('class' => 'form-control', 'required' => '')) }}
>>>>>>> Stashed changes
			</div>

			<div class="input-group">
				{{ Form::label('amount', 'Amount:') }}
					{{ Form::number('amount', null, array('class' => 'form-control', 'required' => '')) }}
			</div>

			<div class="input-group">
				{{ Form::label('CCN', 'Your Card:') }}
					{{ Form::select('CCN', $CCNs) }}
			</div>

				{{ Form::submit('Pledge', array('class' => 'btn btn-success btn-lg', 'style' => 'margin-top: 20px')) }}
				<a href="{{ route('project.show',$project->pid)}}" class="btn btn-danger btn-lg", style="margin-top: 20px;">Cancel</a>
		{!! Form::close() !!}
		</div>
	</div>

@endsection