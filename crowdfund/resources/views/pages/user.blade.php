@extends('main')

@section('loginorsignup')
	<ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#">
          <span class="glyphicon glyphicon-user" aria-hidden="true">
          {{ Session::get('uid') == $user->uid ? "User: $user->uname" : "Log in" }} </span>
          </a>
        </li>
        <li>{{-- <a href="{{ route('user.destroy', $user->uid) }}">Log out</a> --}}
	{{-- {!! Html::linkRoute('user.destroy', 'Log out', array($user->uid), array()) !!} --}}
	{!! Form::open(['route' => ['user.destroy', $user->uid], 'method' => 'DELETE']) !!}

	{!! Form::submit('Log out', ['class' => 'btn btn-link']) !!}

	{!! Form::close() !!}
        </li>
      </ul>

@stop

@section('title','| Customer')

@include('partials._messages')

@section('content')
		<p class="lead">Customer info</p>
		<P>THIS IS User {{ $user->uid }}
			{{ Session::get('uid') == $user->uid ? Session::get('uid') : "None" }}
		</P>



@stop