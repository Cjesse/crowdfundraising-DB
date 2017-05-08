@extends('main')

@section('title', '| Login')

@section('content')
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<br>

	<br>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
            <div class="panel panel-success">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
			{!! Form::open() !!}
				<div class="col-md-6 col-md-offset-3">
				{{ Form::label('email', 'Email:') }}
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
				{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
				</div>
				<p></p>
				
				{{ Form::label('password', "Password:") }}
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
				
				</div>
					<p></p>
				{{ Form::checkbox('remember') }} {{ Form::label('remember', "Remember Me") }}
				
				<br>
				{{ Form::submit('Login', ['class' => 'btn btn-success btn-lg btn-block']) }}

			</div>
			{!! Form::close() !!}
		</div>
            </div>
        </div>
    </div>
	</div>

@endsection