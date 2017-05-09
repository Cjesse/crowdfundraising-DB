@extends('main')

@section('title', '| Create Project')

@section('stylesheet')
	{!!	Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>

@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Project</h1>
			<hr>
		{!! Form::open(array('route' => 'project.store', 'data-parsley-validate' => '')) !!}
			{{-- {!! csrf_field() !!} --}}
			<div class="input-group">
				{{ Form::label('pname', 'Project Name:') }}
					{{ Form::text('pname', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
			</div>

			<div class="input-group">
				{{ Form::label('description', 'Project description:') }}
					{{ Form::textarea('description', null, array('class' => 'form-control')) }}
			</div>

			<div class="input-group">
				{{ Form::label('tags', 'Tags:') }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value='{{ $tag->id }}'>{{ $tag->content }}</option>
					@endforeach
				</select>
			</div>
			
			<div class="input-group">
				{{ Form::label('sample','Sample material:') }}
					{{ Form::file('sample',null,array('class' => 'form-control','style' =>'margin-top: 20px')) }}
			</div>

			<div class="input-group">
				{{ Form::label('category','Category') }}
					{{ Form::select('category',['Music' => 'Music', 'Art' => 'Art', 'Film' => 'Film', 'Literature' => 'Literature'],null,array('class' => 'form-control','style' =>'margin-top: 20px')) }}
			</div>

			<div class="input-group">
				{{ Form::label('enddate','Funding End Date:') }}
					{{ Form::date('enddate', \Carbon\Carbon::now(),null,array('class' => 'form-control', 'required' => '', 'style' =>'margin-top: 40px')) }}
			</div>

			<div class="input-group">
				{{ Form::label('deadline','Target Complete Date:') }}
					{{ Form::date('deadline', \Carbon\Carbon::now(),null,array('class' => 'form-control', 'required' => '', 'style' =>'margin-top: 40px')) }}
			</div>

			<div class="input-group">
				{{ Form::label('minfund', 'Minimun Fund:') }}
					{{ Form::number('minfund', null, array('class' => 'form-control', 'required' => '')) }}
			</div>

			<div class="input-group">
				{{ Form::label('maxfund', 'Maximum Fund:') }}
					{{ Form::number('maxfund', null, array('class' => 'form-control', 'required' => '')) }}
			</div>
				{{ Form::submit('Create Project', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
		{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('script')
	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection