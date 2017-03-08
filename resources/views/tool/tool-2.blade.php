@extends('tool.tool')
@section('navigator')
	<div data-role="navbar">
		<ul>
			<li><a href="/method/1">Chu kỳ đều</a></li>
			<li><a href="/method/2" class="ui-btn-active ui-state-persist">Chu kỳ không đều</a></li>
		</ul>
	</div>	
@stop

@section('sub-title', 'Chu kỳ không đều')

@section('note')
* Lưu ý: Cần theo dõi chu kỳ từ <span class="highlight bold">6 tháng</span> đến <span class="highlight bold">1 năm</span> để có kết quả chính xác
@stop

@section('form')
	<label>Ngày bắt đầu gần nhất</label>
	<input name="last-time" id="last-time" type="date" value="<?php echo date("Y-m-d");?>" required>
	<br>
	<label for="period-short">Chu kỳ ngắn nhất</label>
	<input type="range" name="period-short" id="period-short" value="18" min="18" max="45" data-mini="false" data-highlight="true" required>
	<br>
	<label for="period-long">Chu kỳ dài nhất</label>
	<input type="range" name="period-long" id="period-long" value="18" min="18" max="45" data-mini="false" data-highlight="true" required>
	<div class="ui-grid-b center">
		<div class="ui-block-a"></div>
		<div class="ui-block-b">
			<input type="submit" data-inline="true" value="Kiểm tra" >
		</div>
		<div class="ui-block-c"></div>
	</div>
	<div data-role="popup" id="popup-result-2">
		<div data-role="content" class="popup">
			<h3 class="center">Kết quả</h3>
			<p id="popup-result-content-2"></p>
			<div class="ui-grid-b center">
				<div class="ui-block-a"></div>
				<div class="ui-block-b">
					<input type="button" data-inline="false" value="OK" id="popup-result-btn-2">
				</div>
				<div class="ui-block-c"></div>
			</div>
		</div>		
	</div>

	<script>
		function updateCondition() {
			var $min = $("#period-short").val();
			$("#period-long").attr("min", $min);
			$("#period-long").val($min);
		}

		function calculate() {			
			var timeStamp = moment($("#last-time").val()).unix();
			var periodShort = $("#period-short").val();
			var periodLong = $("#period-long").val();
			var begin = moment.unix(calBegin(timeStamp, periodShort)).format("DD/MMM/YYYY");
			var end = moment.unix(calEnd(timeStamp, periodLong)).format("DD/MMM/YYYY");
			showResult( "Thời gian có thể thụ thai:<br>" + begin + " - " + end, 2 );
		}
	</script>
@stop