@extends('main')

@section('title', '| My HomePage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="http://lorempixel.com/180/180/people/9/" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                           {{ Auth::user()->uname }}</h4>
                        <small><cite title="San Francisco, USA">{{ Auth::user()->hometown }} <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{ Auth::user()->email }}
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://localhost:8000/user/index">http://localhost:8000/user/index</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
                        <!-- Split button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Modify</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<nav aria-label="...">
  <ul class="pager">
    <li class="previous"><a href="/user/index"><span aria-hidden="true">&larr;</span> Back</a></li>
   {{--  <li class="next"><a href="#">Modify <span aria-hidden="true">&rarr;</span></a></li> --}}
  </ul>
</nav>


@stop