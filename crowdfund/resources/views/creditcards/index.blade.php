@extends('main')

@section('content')

@include('partials._messages')



<div class="row">
	<div class="col-md-8">
		<h3>{{ Auth::user()->uname }}'s Credit Cards</h3>
	</div>

	<div class="col-md-4">
		<a href="{{ route('creditcard.create')}}" class="btn btn-success">Add Credit Card
	</a>
</div>

<div class="row">
	<table class="table">
		<thead>
			<tr>
				<th>CreditCardNumber</th>
				<th>Update date</th>
				<th width="100px"></th>
			</tr>
		</thead>

		<tbody>
			@foreach(Auth::user()->credit_cards as $creditcard)
			<tr>
				<td>{{ $creditcard->CCN }}</td>
				<td>{{ $creditcard->updated_at}}</td>
{{-- 				<td>
					<a href="{{route('creditcards.edit',$creditcard->id) }}" class="btn btn-xs btn-primary">change</a>

					<a href="{{route('creditcards.delete',$creditcard->id)}}" class="btn btn-xs btn-danger">delete</a>
 --}}				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection