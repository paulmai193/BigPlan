@extends('track.track')

@section('navigator')
	<div data-role="navbar">
		<ul>
			<li><a href="/track/calendar" class="ui-btn-active ui-state-persist">Lịch kinh nguyệt</a></li>
			<li><a href="#">Thống kê</a></li>
		</ul>
	</div>	
@stop

@section('sub-title', 'Lịch kinh nguyệt')

@section('form')
	<div class="content center">
		<div id="period-calendar" data-inline="true"></div>
	</div>
	
	<style>
		#period-calendar {
			display: inline-block;
			margin: 0 auto;
		}
		.ui-state-highlight .ui-state-default {
			background-color: #ffe4e1;
		}
		.ui-state-current .ui-state-default {
			background-color: #ffc0cb;
		}
	</style>
@stop