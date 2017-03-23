@extends('master')
@section('css')
	<link rel="stylesheet" href="/css/track.min.css">
	@yield('css-1')
@stop
@section('js')
	<script src="{{ URL::asset('/js/track.ob.js.gz') }}"></script>
	@yield('js-1')
@stop
@section('title', 'Theo dõi chu kỳ')
@section('body')
	@if (Route::has('logged in'))
		@if (Auth::check())
			<a href="{{ url('/home') }}">Home</a>
		@else
			<div data-role="content center">
				<p>Bạn cần đăng nhập để sử dụng tính năng này</p>
				<a href="{{ url('/login') }}">Đăng nhập</a>
				<strong> | </strong>
				<a href="{{ url('/register') }}">Đăng ký</a>
			</div>		
		@endif
	@else
		<div class="title sub-title">
			<h1>@yield('sub-title')</h1>			
		</div>		
		<div class ="content">
			@yield('form')
		</div>
	@endif
@stop