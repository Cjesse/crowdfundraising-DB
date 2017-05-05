@extends('main')

@section('title','| Customer')

@include('partials._messages')

@section('content')
		<p class="lead">Customer info</p>
		<P>THIS IS User {{ $user->uid }}</P>



@stop