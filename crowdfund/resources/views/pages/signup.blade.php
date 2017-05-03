@extends('main')
@section('loginorsignup')
	<ul class="nav navbar-nav navbar-right">
        <li>
          <a href="/login">
          <span class="glyphicon glyphicon-off" aria-hidden="true">
          Log in
          </span>
          </a>
        </li>
        <li><a href="/signup">Sign up</a></li>
      </ul>
@endsection
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
			<h3>Sign up</h3>
			<hr>
			<p></p>
				{{-- <div class="well well-sm"> --}}
			{!! Form::open(array('route' => 'user.store', 'data-parsley-validate' => '')) !!}
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
				  {{-- <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1"> --}}
				  {{ Form::text('uname', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => '']) }}
				</div>
				<p></p>

				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
				  {{-- <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1"> --}}
				  {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required' => '', 'data-parsley-type' => 'email']) }}
				</div>
				<p></p>

				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				  {{-- <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1"> --}}
				  {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => '']) }}
				</div>
					<p></p>
				
				{{ Form::submit('Sign up', array('class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
				{!! Form::close() !!}
			{{-- 	</div> --}}
			</div>
			

		</div>

	</div>


@endsection

@section('script')
	{!! Html::script('js/parsley.min.js') !!}
@endsection