@extends('main')

@section('title', '| Edit Project')

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
			<h1>Edit Project</h1>
			<hr>
		{!! Form::model($project,['route' => ['project.update',$project->pid],'method' => 'PUT','data-parsley-validate' => '']) !!}


				{{ Form::label('pname', 'Project Name:') }}
					{{ Form::text('pname', $project->pname, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}



				{{ Form::label('description', 'Project description:') }}
					{{ Form::textarea('description', $project->description, array('class' => 'form-control')) }}



				{{ Form::label('tags', 'Tags:') }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value='{{ $tag->id }}'>{{ $tag->content }}</option>
					@endforeach
				</select>

				{{ Form::submit('Save changes', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
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