@extends('tool.tool')

@section('navigator')
	<div data-role="navbar">
		<ul>
			<li><a href="/method/1" class="ui-btn-active ui-state-persist">Chu kỳ đều</a></li>
			<li><a href="/method/2">Chu kỳ không đều</a></li>
		</ul>
	</div>	
@stop

@section('sub-title', 'Chu kỳ đều')

@section('form')
	<label>Ngày bắt đầu gần nhất</label>
	<input name="last-time" id="last-time" type="date" value="<?php echo date("Y-m-d");?>" required>
	<br>
	<label for="period">Chu kỳ</label>
	<input type="range" name="period" id="period" value="18" min="18" max="45" data-mini="false" data-highlight="true" required>
	<div class="ui-grid-b center">
		<div class="ui-block-a"></div>
		<div class="ui-block-b">
			<input type="submit" data-inline="true" value="Kiểm tra" >
		</div>
		<div class="ui-block-c"></div>
	</div>
	<div data-role="popup" id="popup-result-1">
		<div data-role="content" class="popup">
			<h3 class="center">Kết quả</h3>
			<p id="popup-result-content-1"></p>
			<div class="ui-grid-b center">
				<div class="ui-block-a"></div>
				<div class="ui-block-b">
					<input type="button" data-inline="false" value="OK" id="popup-result-btn-1">
				</div>
				<div class="ui-block-c"></div>
			</div>
		</div>		
	</div>
	
	<script>
		function calculate() {			
			var timeStamp = moment($("#last-time").val()).unix();
			var period = $("#period").val();
			var begin = moment.unix(calBegin(timeStamp, period)).format("DD/MMM/YYYY");
			var end = moment.unix(calEnd(timeStamp, period)).format("DD/MMM/YYYY");
			showResult( "Thời gian có thể thụ thai:<br>" + begin + " - " + end, 1 );
		}
	</script>
@stop			