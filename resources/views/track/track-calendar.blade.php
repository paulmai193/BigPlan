@extends('track.track')
@section('css-1')
	<link rel="stylesheet" href="/css/track-calendar.min.css">
@stop
@section('js-1')
	<script src="{{ URL::asset('/js/track-calendar.ob.js') }}"></script>
@stop
@section('navigator')
	<div data-role="navbar">
		<ul>
			<li><a href="/track/calendar" data-icon="custom-calendar" class="ui-nodisc-icon ui-btn-active ui-state-persist" id="nav-1"></a></li>
			<li><a href="/track/statistic" data-icon="custom-statistic" class="ui-nodisc-icon" id="nav-2"></a></li>
		</ul>
	</div>	
@stop
@section('sub-title', 'Lịch kinh nguyệt')
@section('form')
	<div class="content center">
		<div id="period-calendar" data-inline="true"></div>
	</div>
	<br>
	<!-- Update period -->
	<div class ="content">
		<div class="ui-grid-b">
			<div class="ui-block-a"></div>
			<div class="ui-block-b" center>
				<a href="calendar/add" data-transition="slideup" data-position-to="window" class="ui-btn ui-btn-icon-top ui-nodisc-icon ui-icon-custom-add" id="open-popup-add"></a>
			</div>
			<div class="ui-block-c"></div>
		</div>
	</div>
@stop