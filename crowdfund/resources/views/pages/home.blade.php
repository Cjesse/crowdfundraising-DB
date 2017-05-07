@extends('main')

@section('title', '| Homepage')

@section('loginorsignup')
	<ul class="nav navbar-nav navbar-right">
        <li>
          <a href="/auth/login">
          <span class="glyphicon glyphicon-off" aria-hidden="true">
          Log-in</span>
          </a>
        </li>
        <li><a href="/auth/register">Register</a></li>
      </ul>
@endsection

@section('nav2')
	
		<!-- 4:3 aspect ratio -->
		<div class="embed-responsive embed-responsive-16by9">
  			<iframe class="embed-responsive-item" width="300" height="150" src="//www.youtube.com/embed/8b5-iEnW70k"></iframe>
		</div>
		<br>
@endsection