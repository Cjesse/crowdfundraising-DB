@extends('main')

@section('title', '| Login')

@section('loginorsignup')
	<ul class="nav navbar-nav navbar-right">
        <li>
          <a href="/auth/login">
          <span class="glyphicon glyphicon-off" aria-hidden="true">
          Log-in
          </span>
          </a>
        </li>
        <li><a href="/auth/register">Register</a></li>
      </ul>
@endsection

@section('content')
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<br>

	<br>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h3>Log in</h3>
			<hr>
			<p></p>
			{!! Form::open() !!}
				
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


			{!! Form::close() !!}
		</div>
	</div>

@endsection