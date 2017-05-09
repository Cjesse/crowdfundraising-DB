@extends('main')

@section('title', '| Rate')

@section('stylesheet')
	{!!	Html::style('css/parsley.css') !!}
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Rate Project{{ $project->pname}}</h1>
			<span class="label label-info">Rating:{{$averating}}</span>
		{!! Form::open(array('route' => 'rate.store', 'data-parsley-validate' => '')) !!}
			<div class="input-group">
				{{ Form::label('pid', 'Project id') }}
					{{ Form::text('pid', $project->pid, array('class' => 'form-control', 'required' => '','id'=>'disabledInput')) }}
			</div>
			<hr>

			<div class="input-group">
				{{ Form::label('level', 'Rating:') }}
					{{ Form::select('level', ['0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5']) }}
			</div>
			<hr>
			
				{{ Form::submit('Rate', array('class' => 'btn btn-success btn-lg', 'style' => 'margin-top: 20px')) }}
				<a href="{{ route('project.show',$project->pid)}}" class="btn btn-danger btn-lg", style="margin-top: 20px;">Cancel</a>
		{!! Form::close() !!}
		</div>
</div>


@endsection