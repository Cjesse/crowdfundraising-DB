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