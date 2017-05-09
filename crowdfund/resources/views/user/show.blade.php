@extends('main')
<?php $username = htmlspecialchars($user->uname); ?>
@section('title', "| $username")

@section('content')

<div class="wrapper">
        <div class="container">
          <div class="row">
                <div class="col-md-12">
                <header id="header">

  <div class="slider">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="http://placehold.it/1200x400/F34336/F34336&text=START YOUR PLEDGE TODAY">
    </div>
    <div class="item">
      <img src="http://placehold.it/1200x400/20BFA9/ffffff&text=CREATE %26 SMART">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="fa fa-angle-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="fa fa-angle-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                  </div><!--slider-->
                  <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">

                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="#"><img class="img-responsive" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" alt="John Doe" width="30px" height="40px"></a>
                          <span class="site-name"><b>{{ $user->uname }}</b></span>
                          <span class="site-description">Welcome to My Homepage!</span>
                        </div>
                    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="mainNav" >
                          <ul class="nav main-menu navbar-nav">
                            <li><a href="/user/{{ $user->uid }}"><i class="fa fa-home"></i> HOME</a></li>
                            @if(DB::table('follows')->where('follower','=', Auth::user()->uid)->where('followee','=', $user->uid)->count() != 1)
                              <div class="col-md-3 offset-md-3">
                                <a href="{{ route('follow.store', $user->uid)}}" class="btn btn-success btn-sm" style='margin-top:10px;'>Follow</a>
                              </div>
                            @else
                              <div class="col-md-3 offset-md-3">
                                {{ Form::open(['route' => ['follow.destroy', $user->uid], 'method' => 'DELETE']) }}
                                {{ Form::submit('Unfollow', ['class' => 'btn btn-danger btn-sm', 'style'=>'margin-top:10px;']) }}
                                {{ Form::close() }}
                              </div>
                            @endif
                          </ul>
                          
                           <ul class="nav  navbar-nav navbar-right">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
          </nav>
                    
    </header><!--/#HEADER-->
            
  
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                  <h1>About {{ $user->uname }}</h1>
                  <p class="lead">Here is a description about {{ $user->uname }}...</p>
                </div>
            </div>
        </div> <!-- end of header .row -->
<h3>His/Her Projects</h3>
<hr>

		<div class="row">
			
			@foreach(DB::table('projects')->where('user_uid', '=', $user->uid)->get() as $project)
      <div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="https://prpop.org/wp-content/uploads/2016/01/humberto-ramirez-2016-bohemia-jazz-e1454100881603.jpg{{-- {{asset('/images/' . $project->sample)}} --}}" alt=""> <!-- need to be fixed -->
					<div class="caption">
						<h3>{{ $project->pname }}</h3>
						<p>{{ substr(strip_tags($project->description), 0, 70) }}{{ strlen(strip_tags($project->description)) > 70 ? "..." : "" }}</p>
						<p><a href="{{ route('project.show', $project->pid) }}" class="btn btn-success" role="button">View</a></p>
					</div>
				</div>
      </div>
			@endforeach	
		
		</div>


@stop