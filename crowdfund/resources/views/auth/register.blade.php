@extends('main')

@section('title', '| Register')

@section('content')
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<br>

	<br>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
			{!! Form::open() !!}
			<div class="col-md-6 col-md-offset-3">
				{{ Form::label('uname', "Name:") }}
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
				{{ Form::text('uname', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
				</div>
				<p></p>

				{{ Form::label('email', 'Email:') }}
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
				{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) }}
				</div>
				<p></p>

				{{ Form::label('password', 'Password:') }}
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
				</div>
					<p></p>

				{{ Form::label('password_confirmation', 'Confirm Password:') }}
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
				</div>
					<p></p>
				{{ Form::submit('Register', ['class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top: 20px']) }}
			</div>
			{!! Form::close() !!}
		</div>
            </div>
        </div>
    </div>
	</div>

@endsection