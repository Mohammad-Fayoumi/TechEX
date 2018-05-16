@extends('layouts.app')

@section('title')
	Contact
@stop

@section('content')
	<h1>Contact Page</h1>
	@if(count($peoples) > 0)
		<ul>
			@foreach($peoples as $person)
			<li>{{$person}}</li>
                @e
			@endforeach
		</ul>
	@endif
@stop

@section('JS')
	<!-- <script type="text/javascript">alert('Welcome to contact page')</script> -->
@stop
