@extends('main')

@section('content')
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<br>

	<br>
	<div class="container">

	
		<div class="row">
		
			<div class="col-md-4 col-md-offset-4">
			<h3>Log in</h3>
			<hr>
			<p></p>
				{{-- <div class="well well-sm"> --}}
			{!! Form::open(array('url' => 'login', 'data-parsley-validate' => '')) !!}
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
				  {{-- <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1"> --}}
				  {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => '']) }}
				</div>
				<p></p>

				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				  {{-- <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1"> --}}
				  {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => '']) }}
				</div>
					<p></p>
					{{ Form::checkbox('remember', null)}}
					Remember Me
				
				{{ Form::submit('Log in', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
				{!! Form::close() !!}
			{{-- 	</div> --}}
			</div>
			

		</div>

	</div>





@endsection

@section('script')
	{!! Html::script('js/parsley.min.js') !!}
@endsection