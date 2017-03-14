@extends('tool.tool')
@section('js-1')
	<script>
		$(document).on("pagecreate", function() {
			fillLastPeriod(2);
			var min = track.shortestPeriod === 46 ? 30 : track.shortestPeriod > 18 ? track.shortestPeriod : 18;
			$("#period-short").val(min).slider("refresh");;
			if(min < track.longestPeriod) {
				$("#period-long").attr("min", min).val(track.longestPeriod).slider("refresh");;
			}
			else {
				$("#period-long").attr("min", min).val(min).slider("refresh");;
			}
			
			$(document).on("change", "#period-short", function(){
				var min = $("#period-short").val();
				var max = $("#period-long").val();
				if(min > max) {
					$("#period-long").attr("min", min).val(min).slider("refresh");
				}
				else {
					$("#period-long").attr("min", min).slider("refresh");
				}
			});
			$("#form-2").submit(function(e) {
				e.preventDefault();
				calculate2();				
			});
		})
		function calculate2() {			
			var timeStamp = moment($("#last-time-2").val(), showDateFormat).unix();
			var periodShort = $("#period-short").val();
			var periodLong = $("#period-long").val();
			var begin = moment.unix(calBegin(timeStamp, periodShort)).format(showDateFormat);
			var end = moment.unix(calEnd(timeStamp, periodLong)).format(showDateFormat);
			showResult( "Thời gian có thể thụ thai:<br>" + begin + " - " + end, 2 );
		}
	</script>
@stop
@section('navigator')
	<div data-role="navbar">
		<ul>
			<li>
				<a href="/method/1" data-icon="custom-refresh" data-iconpos="top" class="ui-nodisc-icon"></a>
			</li>
			<li>
				<a href="/method/2" data-icon="custom-shuffle" data-iconpos="top" class="ui-nodisc-icon ui-btn-active ui-state-persist"></a>
			</li>
		</ul>
	</div>	
@stop
@section('sub-title', 'Chu kỳ không đều')
@section('note')
* Chu kỳ được tính bằng số ngày giữa 2 ngày bắt đầu hành kinh liên tiếp
** Lưu ý: Cần theo dõi chu kỳ từ <span class="highlight bold">6 tháng</span> đến <span class="highlight bold">1 năm</span> để có kết quả chính xác
@stop
@section('form')
	<form id="form-2">
		<label>Ngày bắt đầu gần nhất</label>
		<input name="last-time" id="last-time-2" type="text" required>
		<br>
		<label for="period-short">Chu kỳ ngắn nhất</label>
		<input type="range" name="period-short" id="period-short" value="18" min="18" max="45" data-mini="false" data-highlight="true" required>
		<br>
		<label for="period-long">Chu kỳ dài nhất</label>
		<input type="range" name="period-long" id="period-long" value="18" min="18" max="45" data-mini="false" data-highlight="true" required>
		<br>
		<div class="ui-grid-b center">
			<div class="ui-block-a"></div>
			<div class="ui-block-b">
				<input type="image" src="data:image/png;base64,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" data-inline="true" value="Kiểm tra">
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
						<input type="button" data-inline="true" value="OK" id="popup-result-btn-2">
					</div>
					<div class="ui-block-c"></div>
				</div>
			</div>		
		</div>
	</form>
@stop