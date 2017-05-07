@extends('main')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3>Add an Credit Card</h3>

			{!! Form::open(array('route' => 'creditcard.store'))!!}

				{{ Form::label('CCN','Credit Card Number:')}}
				{{ Form::text('CCN',null,array('class'=>'form-control','required'=>'','maxlength'=>'20')) }}
				{{ Form::submit('Add Card',array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;')) }}
			{!! Form::close()!!}
		</div>
	</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection