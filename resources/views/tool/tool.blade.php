@extends('master')
@section('css')
	<link rel="stylesheet" href="/css/tool.min.css">
@stop
@section('js')
	<script src="{{ URL::asset('/js/tool.ob.js') }}"></script>
	@yield('js-1')
@stop
@section('title', 'Tính thời gian thụ thai')
@section('body')
	<div class="title sub-title">
		<h1>@yield('sub-title')</h1>			
	</div>	
	<div class="note">
		<p>@yield('note')</p>
	</div>
	<div class ="content">
		@yield('form')
	</div>
@stop