@extends('master')
@section('css')
	<style type="text/css">
		.ui-icon-custom-calendar {
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA30lEQVRIS8WVOwoCMRCGv0XwUYjHsbWyEryDV9BKUKy0Em/gHey0sxWPoygIPphl0gV2YzK7acK/C/+XeSSTYbwyY38coA8MgUYi4Ac4ARcBiPkB2AOvRIAmMAHGAlgAHWCeyNzZrIGnAFb6xe2pOLlfZYABcE51dPXJPV0E5gCB1lKDO/AFuhp2iC5V5Bsgl6angBBdChBTdy9gpinZqnOM9gIk3+5+yB6jvYCp5nynoBhdTw1C2rCoAbwRhLRhacASaBs81xvgYTVwWjpwRlYj8w0cgWtlQ7+oYH///wG2lV1/3WACWAAAAABJRU5ErkJggg==) 50% 50% no-repeat;
			background-color: transparent;
			box-shadow: none;
			-webkit-box-shadow: none;
			margin: 0 !important;
		}
		.ui-icon-custom-statistic {
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAARCAYAAADHeGwwAAABUUlEQVQ4T+1UvUoDQRD+Zvf8SaKgEsEmt3vZgEVsRVsfwMLnEESx0CJWRtDOgJ0P4TMo2IgvEMwll9QGCRo1GG/kLiRc1FhICsFMNT878zHf7AwZ5eQJ0ADgw2cpxPldpXIV2MMQMkpztBAxTks1b+eH4jJt6xwJzHbfEHBR8rzL73K+AIBQcD1vexCA1npGMh7643TkViu5fwZglFrzgQ2CEEHrDN+fSyZ36/V6YigUZbQ+ZsZelNfJ58R0M9G0RgDhN/2TFGVsZ50JK5G50cBF+00HaeWcEXiz7zJ8PhXdTR4B9A6hk7JbQojxnoNwUvK8faOcHMCHUT5b7+14YE9I6x5AqHeEDtxqJW+0LoCxFclhMimzxMQLHWebx2Kxm2Kx+AhAGtteZVixsATaL26tdh3oi0o5byxNNweWdVsulxvZ+ezUa/xpmVnKMMZofACjvB2DW3S0AQAAAABJRU5ErkJggg==) 50% 50% no-repeat;
			background-color: transparent;
			box-shadow: none;
			-webkit-box-shadow: none;
			margin: 0 !important;
		}
		.ui-icon-custom-add {
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAADDklEQVRoQ+3ay2sTQRwH8O9vd9OkD5Ea2hINIrFIhbaC0vpoVTxVBP8FtUg9eijUQ0EFiwc9eBCk5uAT/Ac8CK1g6wPEPtAcfVWxhRRtPbVpm83OyKS0mJJsdpOZbArdY5idnc/szO/3280SAOx5NBKoTFKfBZzTwCKAponfy/SYIuCxuZK4/e3ymRUSgw8kaQjAiTIdcNZhcUavLXOxi/ZHR69y4MZmGvz6WAn9tC86+lUDGjclAPhMTdFXVpmv+ZxzyxgzqSk6yjfp7AMM1hbA07u3dQc8nX5s7QHb+dc1gkGUbpPiHBZTEOxU7YGOcC3udTXDr6+WVMsphkvPJzA+tyR30VmKwuiVI3vR3RrOGOz9tzHcmZyBXlUjD1FSwJsYbr0chy8YkocoOWB4DCCSh/AEIBaQLIRnAFkITwEyEJ4DikWUBaAYRCEAkaQ6wjtsY3lbaDua67ZltInN/MHYz3ju84jwbjaBsfll53nCLUCUB5PdnesZ1vmVnLVMJFM4ODgMqqx2doJbgCgNPl087qzzAls1Xn8IrbbBWbIrS8C1B7A4d5bs3ALEEpq40ImAoea9VyJpomXgCRjnzpKdW4BYFW1BP47VVwI21fHRyE4cCNdlLKKP07/x4YfNJgYw8mU6c6Pny9iFAMSorMQCzPk4IGYqy9F/+jB6Olszq1FRzIlayO1hhygUkA8hFWCXJ4oB2CGkA3IhigXkQigBZEPIAGRDKANsRMgCbEQoBfyP8NfIfbW4Fp36u9rlRaFcUUtEp9qQXMDanehr242ejhY5YdQu7DJiSl7utgcDGDx7CFUVRvryIsN2Px2yr0bd5of0bEENQPTNlxaR+jubTnac89XyQPahEpAv2UmxqAYoR5QCoBRRKoAyRCkBShClBkhHeAGQieAWT4lE9h1AREpYc9FJvociZ13xKU8/NSgWQYZvgBrvvvDrvuoh0vhJZ2q5rQpGEL036nedSv+JJRBGoKoXHOcZYxHN7nMbFRXB0gLMuTjlesZemzIOzkjHLzIqnunBhpvic5t/M7QzZZYlGFcAAAAASUVORK5CYII=) 50% 50% no-repeat;
			background-color: transparent !important;
			border: none !important;
			box-shadow: none;
			-webkit-box-shadow: none;
			margin: 0 !important;
		}
	</style>
	@yield('css-1')
@stop
@section('js')
	<script src="/js/track.min.js"></script>
	<script>
		function showCheckFinishPeriod(n) {
			// Show close current period option
			$("#check-finish-d-" + n).removeAttr("hidden");
		}
		function updateCondition(n) {
			$("#date-end-" + n).attr("min", $("#date-begin-" + n).val());
		}
		function showMoreOptions(n) {
			$("#lb-begin-" + n).empty();
			$("#lb-begin-" + n).append("Từ ngày");
			$("#date-end-" + n).val($("#date-begin-" + n).val());
			$("#more-input-d-" + n).removeAttr("hidden");
			$("#date-end-" + n).removeAttr("novalidate");
			$("#date-end-" + n).prop('required',true);
			$("#more-input-a-" + n).prop('hidden',true);
		}
		function closePopup(n) {
			$("#popup-add-" + n).popup("close");
		}
		function hidePopupInput(el,n) {
			$("#more-input-a-" + n).toggle(!el.checked);
			$("#lb-begin-" + n).toggle(!el.checked);
			$("#date-begin-" + n).toggle(!el.checked);
			$("#lb-end-" + n).toggle(!el.checked);
			$("#date-end-" + n).toggle(!el.checked);
		}
	</script>
	@yield('js-1')
@stop
@section('title', 'Theo dõi chu kỳ')
@section('body')
	@if (Route::has('logged in'))
		@if (Auth::check())
			<a href="{{ url('/home') }}">Home</a>
		@else
			<div data-role="content center">
				<p>Bạn cần đăng nhập để sử dụng tính năng này</p>
				<a href="{{ url('/login') }}">Đăng nhập</a>
				<strong> | </strong>
				<a href="{{ url('/register') }}">Đăng ký</a>
			</div>		
		@endif
	@else
		<div class="title sub-title">
			<h1>@yield('sub-title')</h1>			
		</div>		
		<div class ="content">
			@yield('form')
		</div>
	@endif
@stop