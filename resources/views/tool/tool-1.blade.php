@extends('tool.tool')
@section('js-1')
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
@section('navigator')
	<div data-role="navbar">
		<ul>
			<li>
				<a href="/method/1" data-icon="custom-refresh" data-iconpos="top" class="ui-nodisc-icon ui-btn-active ui-state-persist">
					Chu kỳ đều
				</a>
			</li>
			<li>
				<a href="/method/2" data-icon="custom-shuffle" data-iconpos="top" class="ui-nodisc-icon">
					Chu kỳ không đều
				</a>
			</li>
		</ul>
	</div>	
@stop
@section('sub-title', 'Chu kỳ đều')
@section('note')
* Chu kỳ được tính bằng số ngày giữa 2 ngày bắt đầu hành kinh liên tiếp
@stop
@section('form')
	<label>Ngày bắt đầu gần nhất</label>
	<input name="last-time" id="last-time" type="date" value="<?php echo date("Y-m-d");?>" required>
	<br>
	<label for="period">Chu kỳ</label>
	<input type="range" name="period" id="period" value="18" min="18" max="45" data-mini="false" data-highlight="true" required>
	<div class="ui-grid-b center">
		<div class="ui-block-a"></div>
		<div class="ui-block-b">
			<input type="image" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAEsUlEQVR4Xu1afWhbVRT/nftqTT9e0n2IMBnqpmMqU0RRkCnIhjB0MpGJos1r19qiS2Kd3yBsCPvDD2iTlEI7XJq0E+lAYcwPUOecDPxD/9HhBvMDFMomXde8dGlrknskcRmhMX29j3QuyXv/BHLOO/ee3/udc+499xJq/KEa9x8OAA4DahwBJwRqnABOEnRC4D9D4MWxBk8muRUQy8sdIkwyCZE+bPZ2Thba1l/6YCVSqYcFqKHcYwJyMm7yIQy3z863XcQAz3MHlnFd+lsQbiv/RC5ZPANN3G/2tv6S/Uf3RdaTEMcAXLNUYxLRT0SZB6b62qcKxygCwB2I7gawB0SfgPn7JZjQGgCtAEbNkJH9hTsQHQOwnYAIA3+UfUzCPWBsIdCb8ZB378IA+CLDEMJgwtZE0Dhc7sk098RuEZJ/BuG4GTQ25gDwRb6DEPdCEzfnWVHOcfVA9DECPiLw+/FQW+f/CsBFup+8rAD0jGwjKT92AHAY4ISAkwOcJGi3Cnh8sRulhutUyxMTzk33eU/m36vMKrBnrL55cua8ABpVAQAkk8Y3xXt3/Faw6qu0MsikB0b2EjK3qgLAUjuboKkAwoG5CgZA1e3S+pUZAuXzP7/xqbQQKB8CDgP+3fo6DHA2Q4vYDnv8w2vBYplqAKaQGk/2d4xfWntU4m5Q3xldR5o8BQjlvqUkik+Pu1bg4BOZXOlVAUD3xQZJcBcRdRFlDqqib6XPGXE3E74A4yszbGwu1RBZ1TXYOF1fPwBNW2llc76cwScSQeN1WwxoCUQflMAR1UFV9ZnRkQgb+y9LR0iFAdkJeV4YfjzN9CoBK1Qds9InxgUiGjJDrQMA8RUJgDsQexKSX2MB5QRkCYDMJKGJfWbQ6LsiAfD4o5tzMbrED4G746G2odIMyO4/Yttgg4XMdHo67P3GVg7Q/dEhIjzL4B2udGPZk+CMNnuXID7KhCOJoLGpFABNvsgGTYgfbX0HKf82zzY12qoCbtW2eNfgVbrL9cjVrvSXE+90JKwmvOil8PYxTV812wOw8mEJASfMoDFqiwGqALj9w0+DaBRMu82w962yAWBlSEGutA5QBUAPRDsJ2MeEtwtrb6n5LZoBCg5aqToAqKwDHAYoJkEnBGojBzB5/NF3WYj1RRsPyauJcLsEfhVEp+bLifmvuCmfz19OqMwkmGuLJ88JULNVxi2WSyaprY33e3/PyioTAADLd+1fnU5R0cEIEz1KoDcYGCGWA0UA1NVNFJ75VywAJet6beSA0sR3qoDDAGcpXNt7gRb/yB2S5IeQ2GX2G59ZlcmqqwJWDs+XL3hNDnKdGWo/rWrTSl/tmtzFi5IM+pwgf7AyriqXRGsE4ykwxcyw18h1hALREQDPgHEIxH+q2rTWpzsB3MfgVxKhtvcK9YsOHVp6Ii3M2jFm3mBt2LbGOEnamF8dtuw8cH0K6aOahhtsW7R6kXC8eWb2ofGh7uSCAOSEbRGX7hZb7DQkLefBfEGbm/v0/FB3vFD32pdjTcmU3EQsbNxCWXhUYp6In2n4Ot8jtAbAyosqkiufu1WR7zlXHACq7Yuq+uMwQBWxatN3GFBtX1TVn5pnwD96kACMutxpjwAAAABJRU5ErkJggg==" data-inline="true" value="Kiểm tra">
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
@stop			