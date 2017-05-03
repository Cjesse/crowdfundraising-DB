@extends('main')

@section('name', '| Create Project')

@section('stylesheet')
	{!!	Html::style('css/parsley.css') !!}
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Project</h1>
			<hr>

			{{ Form::label('title', 'Project Name:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
			{{ Form::label('body', 'Project Body:') }}
				{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}
			{{ Form::submit('Create Project', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}

			{{-- {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('body', 'Blog Body:') }}
				{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
			{!! Form::close() !!} --}}
		</div>
	</div>

@endsection

@section('script')
	{!! Html::script('js/parsley.min.js') !!}
@endsection