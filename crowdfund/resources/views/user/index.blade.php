@extends('main')

@section('title', '| My HomePage')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                  <h1>Recommended to You</h1>
                  <p class="lead">Here are the recommedations based on your interests...</p>
                </div>
            </div>
        </div> <!-- end of header .row -->
<h3>My Projects</h3>
<hr>

        <div class="row">
            
            @foreach(Auth::user()->project as $project)
      <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="https://prpop.org/wp-content/uploads/2016/01/humberto-ramirez-2016-bohemia-jazz-e1454100881603.jpg{{-- {{asset('/images/' . $project->sample)}} --}}" alt=""> <!-- need to be fixed -->
                    <div class="caption">
                        <h3>{{ $project->pname }}</h3>
                        <p>{{ substr(strip_tags($project->description), 0, 70) }}{{ strlen(strip_tags($project->description)) > 70 ? "..." : "" }}</p>
                        <p><a href="{{ route('project.show', $project->pid) }}" class="btn btn-success" role="button">View</a> <a href="{{ route('project.edit', $project->pid) }}" class="btn btn-info" role="button">Update</a></p>
                    </div>
                </div>
      </div>
            @endforeach 
            
        </div>
<h3>Recent Posts</h3>

<hr>
<h3>People You Followed</h3>

<div class="container">
    <div class="row">
        <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-globe"></span>
                <h3 class="panel-title">
                    Recent Actions</h3>
                <span class="label label-info">
                    3</span>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                @foreach(DB::table('follows')->where('follower', '=', Auth::user()->uid)->get() as $followee)
                  @foreach(DB::table('comments')->where('user_uid', '=', $followee->followee)->orderBy('created_at', 'desc')->get() as $comment)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="https://images-na.ssl-images-amazon.com/images/I/518hmCtPngL._SX258_BO1,204,203,200_.jpg" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="{{ route('project.show', $comment->project_pid) }}">{{ DB::table('projects')->where('pid', '=', $comment->project_pid)->value('pname') }}</a>
                                    <div class="mic-info">
                                        Commented By: <a href="/user/{{ $followee->followee }}">{{ DB::table('users')->where('uid', '=', $followee->followee)->value('uname') }}</a> on {{ $comment->created_at }}
                                    </div>
                                </div>
                                <div class="comment-text">
                                    {{ $comment->content }}
                                </div>
                                <div class="action">
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                @endforeach
                @foreach(DB::table('follows')->where('follower', '=', Auth::user()->uid)->get() as $followee)
                  @foreach(DB::table('likes')->where('user_uid', '=', $followee->followee)->orderBy('created_at', 'desc')->get() as $like)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="https://images-na.ssl-images-amazon.com/images/I/518hmCtPngL._SX258_BO1,204,203,200_.jpg" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="{{ route('project.show', $like->project_pid) }}">{{ DB::table('projects')->where('pid', '=', $like->project_pid)->value('pname') }}</a>
                                    <div class="mic-info">
                                        Liked By: <a href="/user/{{ $followee->followee }}">{{ DB::table('users')->where('uid', '=', $followee->followee)->value('uname') }}</a> on {{ $like->created_at }}
                                    </div>
                                </div>
                                <div class="action">
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                @endforeach
                @foreach(DB::table('follows')->where('follower', '=', Auth::user()->uid)->get() as $followee)
                  @foreach(DB::table('pledges')->where('user_uid', '=', $followee->followee)->orderBy('created_at', 'desc')->get() as $pledge)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="https://images-na.ssl-images-amazon.com/images/I/518hmCtPngL._SX258_BO1,204,203,200_.jpg" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="{{ route('project.show', $pledge->project_pid) }}">{{ DB::table('projects')->where('pid', '=', $pledge->project_pid)->value('pname') }}</a>
                                    <div class="mic-info">
                                        Pledged By: <a href="/user/{{ $followee->followee }}">{{ DB::table('users')->where('uid', '=', $followee->followee)->value('uname') }}</a> on {{ $pledge->created_at }}
                                    </div>
                                </div>
                                <div class="action">
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                @endforeach
                </ul>
                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
            </div>
        </div>
    </div>
</div>


<hr>
<h3>Recent Funded</h3>
@foreach(DB::table('pledges')->where('user_uid', '=', Auth::user()->uid)->get() as $pledge)
<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="http://placekitten.com/45/45" alt="">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">You pledged on <a href="{{ route('project.show', $pledge->project_pid) }}">{{ DB::table('projects')->where('pid', '=', $pledge->project_pid)->value('pname') }}</a></h4>
    On {{ $pledge->created_at }}
  </div>
</div>
@endforeach

@stop
