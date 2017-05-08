@extends('main')

@section('title', '| Show Projects')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $project->pname }}</h1>


			<p class="lead"> {{ $project->description }}</p>
		</div>
		
		<div class="col-md-4">
			<div class="well">
				<dl>
					<dt>Funding from:</dt>
					<dd>{{$project->created_at}}</dd>
				</dl>
				<dl>
					<dt>Funding ends:</dt>
					<dd>{{$project->enddate}}</dd>
				</dl>

				<hr>
				<div class="row">
					<div class="col-md-6">
						<a href="#" class="btn btn-info btn-block">Pledge</a>
					</div>
				</div>
			</div><!--end of well-->
			<strong>progress</strong>
			<div class="progress">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $project->currentfund/$project->maxfund*100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project->currentfund/$project->maxfund*100}}%;">
				</div> ${{$project->currentfund}}
			</div>
		</div>
	</div>
@endsection


@section('nav2')

	<!--bootstrap nav tabs -->
	<ul class="nav nav-tabs">
    	<li class="active"><a data-toggle="tab" href="#home">Comments</a></li>
    	<li><a data-toggle="tab" href="#menu1">Updates</a></li>
    	<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    	<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
  	</ul>
	<!--bootstrap nav tabs -->

	<div class="tab-content">
    	<div id="home" class="tab-pane fade in active">

<div class="detailBox">
    <div class="actionBox">
        <ul class="commentList">
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/45/45" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li>
           
            @foreach($project->comments as $comment)
             <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/45/45" />
                </div>
                <div class="commentText">
                    <p class="">{{ $comment->user->uname}}: {{ $comment->content }}.</p> <span class="date sub-text">on {{ date('F nS, Y - g:iA', strtotime($comment->created_on)) }}</span>
                </div>
            </li>
      		@endforeach
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/45/45" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li>
        </ul>
        <form class="form-inline" role="form">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Your comments" />
            </div>
            <div class="form-group">
                <button class="btn btn-default">Add</button>
            </div>
        </form>
    </div>
</div>
      	


    </div>
    <div id="menu1" class="tab-pane fade">
      	<h3>Updates</h3>
      	<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      	<h3>Menu 2</h3>
      	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      	<h3>Menu 3</h3>
      	<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>

@stop