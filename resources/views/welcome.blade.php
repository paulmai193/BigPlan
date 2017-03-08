@extends('master')

@section('title', 'Welcome')

@section('body')
	<!--@if (Route::has('login'))
		<div class="top-right links">
			@if (Auth::check())
				<a href="{{ url('/home') }}">Home</a>
			@else
				<a href="{{ url('/login') }}">Login</a>
				<a href="{{ url('/register') }}">Register</a>
			@endif
		</div>
	@endif-->

	<div class="title main">
		Big Plan
	</div>
@stop