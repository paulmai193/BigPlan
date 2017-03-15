@extends('track.track')
@section('css-1')
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
@section('js-1')
	<!--<script src="/js/track-calendar.min.js"></script>-->
	<script>
		$(document).on("pagecreate", function() {
			var a;
			null !== track.currentPeriod && (a = track.ranges[track.findPreriodById(track.currentPeriod)]);
			var b = {
					numberOfMonths: 1,
					changeMonth: 0,
					regional: "{{ config('app.locale') }}",
				},
				c = b;
			c.beforeShowDay = function(b) {
				for (var b = moment(b).format("YYYY-MM-DD"), c = 0; c < track.ranges.length; c++)
					if (b >= track.ranges[c].start && b <= track.ranges[c].end) return "undefined" != typeof a && a.id === track.ranges[c].id ? [!0, "ui-state-current", "Ngày hành kinh"] : [!0, "ui-state-highlight", "Ngày hành kinh"];
				return [!0, ""]
			};
			$("#period-calendar").datepicker(c).val(new Date())
		});
	</script>
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