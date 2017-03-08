@extends('master')

@section('title', 'Tính thời gian thụ thai')

@section('body')
	<div class="title sub-title">
		<h1>@yield('sub-title')</h1>			
	</div>	
	<div class="note">
		<p>@yield('note')</p>
	</div>
	<div class ="content">
		<form id="main-form">
			@yield('form')
		</form>
	</div>

	<script>
		$( document ).ready(function() {
			$( "form" ).submit(function( event ) {
				event.preventDefault();
				calculate();				
			});

			$( "#period-short" ).change(function() {
				updateCondition();
			});
		})
		
		function showResult(r, i) {
			$("#popup-result-content-" + i).empty();
			$("#popup-result-content-" + i).html(r);
			$("#popup-result-" + i).popup("open");
			$("#popup-result-btn-" + i).on("tap", function() {
				$("#popup-result-" + i).popup("close");
			});
		}
		
		function calBegin(timeStamp, period) {
			return timeStamp + (24 * 60 * 60) * (period - 18);
		}

		function  calEnd(timeStamp, period) {
			return timeStamp + (24 * 60 * 60) * (period - 11);
		}
	</script>
@stop