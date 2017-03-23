@extends('track.track')
@section('css-1')
	<link rel="stylesheet" href="/css/track-statistic.min.css">
@stop
@section('js-1')
	<script src="{{ URL::asset('/js/track-statistic.ob.js') }}"></script>
@stop
@section('navigator')
	<div data-role="navbar">
		<ul>
			<li><a href="/track/calendar" data-icon="custom-calendar" class="ui-nodisc-icon" id="nav-1"></a></li>
			<li><a href="/track/statistic" data-icon="custom-statistic" class="ui-nodisc-icon ui-btn-active ui-state-persist" id="nav-2"></a></li>
		</ul>
	</div>	
@stop
@section('sub-title', 'Thống kê')
@section('form')
	<table data-role="table" id="movie-table" data-mode="columntoggle"  class="ui-responsive">
		<thead>
			<tr>
				<th data-priority="2"></th>
				<th data-priority="1" class="justify"></th>
				<th data-priority="1" class="justify"></th>
				<th data-priority="1" class="justify"></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="center">1</td>
				<td class="">Tổng số chu kỳ</td>
				<td class="right" id="stats-total-period"></td>
				<td class="">lần</td>
			</tr>
			<tr>
				<td class="center">2</td>
				<td class="">Chu kỳ ngắn nhất</td>
				<td class="right" id="stats-shortest-period"></td>
				<td class="">ngày</td>
			</tr>
			<tr>
				<td class="center">3</td>
				<td class="">Chu kỳ dài nhất</td>
				<td class="right" id="stats-longest-period"></td>
				<td class="">ngày</td>
			</tr>
			<tr>
				<td class="center">4</td>
				<td class="">Kỳ kinh ngắn nhất</td>
				<td class="right" id="stats-shortest-menstruation"></td>
				<td class="">ngày</td>
			</tr>
			<tr>
				<td class="center">5</td>
				<td class="">Kỳ kinh dài nhất</td>
				<td class="right" id="stats-longest-menstruation"></td>
				<td class="">ngày</td>
			</tr>
			<tr>
				<td class="center">6</td>
				<td class="">Kỳ kinh hiện tại</td>
				<td class="right" id="stats-current-menstruation"></td>
				<td class=""></td>
			</tr>
		</tbody>
	</table>
	<br>
	<!-- Update period -->
	<div class ="content">
		<div class="ui-grid-b">
			<div class="ui-block-a"></div>
			<div class="ui-block-b" center>
				<a href="statistic/add" data-transition="slideup" data-position-to="window" class="ui-btn ui-btn-icon-top ui-nodisc-icon ui-icon-custom-add" id="open-popup-add"></a>
			</div>
			<div class="ui-block-c"></div>
		</div>
	</div>
@stop