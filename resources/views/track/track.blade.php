@extends('master')
@section('css')
	<style type="text/css">
		.ui-icon-custom-calendar {
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA30lEQVRIS8WVOwoCMRCGv0XwUYjHsbWyEryDV9BKUKy0Em/gHey0sxWPoygIPphl0gV2YzK7acK/C/+XeSSTYbwyY38coA8MgUYi4Ac4ARcBiPkB2AOvRIAmMAHGAlgAHWCeyNzZrIGnAFb6xe2pOLlfZYABcE51dPXJPV0E5gCB1lKDO/AFuhp2iC5V5Bsgl6angBBdChBTdy9gpinZqnOM9gIk3+5+yB6jvYCp5nynoBhdTw1C2rCoAbwRhLRhacASaBs81xvgYTVwWjpwRlYj8w0cgWtlQ7+oYH///wG2lV1/3WACWAAAAABJRU5ErkJggg==) 50% 20% no-repeat;
			background-color: transparent;
			box-shadow: none;
			-webkit-box-shadow: none;
			margin: 0 !important;
		}
		.ui-icon-custom-statistic {
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAARCAYAAADHeGwwAAABUUlEQVQ4T+1UvUoDQRD+Zvf8SaKgEsEmt3vZgEVsRVsfwMLnEESx0CJWRtDOgJ0P4TMo2IgvEMwll9QGCRo1GG/kLiRc1FhICsFMNT878zHf7AwZ5eQJ0ADgw2cpxPldpXIV2MMQMkpztBAxTks1b+eH4jJt6xwJzHbfEHBR8rzL73K+AIBQcD1vexCA1npGMh7643TkViu5fwZglFrzgQ2CEEHrDN+fSyZ36/V6YigUZbQ+ZsZelNfJ58R0M9G0RgDhN/2TFGVsZ50JK5G50cBF+00HaeWcEXiz7zJ8PhXdTR4B9A6hk7JbQojxnoNwUvK8faOcHMCHUT5b7+14YE9I6x5AqHeEDtxqJW+0LoCxFclhMimzxMQLHWebx2Kxm2Kx+AhAGtteZVixsATaL26tdh3oi0o5byxNNweWdVsulxvZ+ezUa/xpmVnKMMZofACjvB2DW3S0AQAAAABJRU5ErkJggg==) 50% 20% no-repeat;
			background-color: transparent;
			box-shadow: none;
			-webkit-box-shadow: none;
			margin: 0 !important;
		}
		.ui-icon-custom-add {
			background: url(data:image/png;base64,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) 50% 50% no-repeat;
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
	<script src="/js/track.js"></script>
	<script>
		function showCheckFinishPeriod(n) {
			// Show close current period option
			$("#check-finish-d-").removeAttr("hidden");
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
		function hidePopupInput(n) {
			$("#more-input-a-" + n).toggle(!this.checked);
			$("#lb-begin-" + n).toggle(!this.checked);
			$("#date-begin-" + n).toggle(!this.checked);
			$("#lb-end-" + n).toggle(!this.checked);
			$("#date-end-" + n).toggle(!this.checked);
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