@extends('master')
@section('css')
	<style type="text/css">
		.ui-icon-custom-refresh {
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAB/0lEQVRIS73VyctPYRQH8M8rQywsLITYmKVM2dgQkiFDyoKFLGwkO/+Homz0bgyFlEKiUDIUURJFhmRj2KFI5o6ey/Ne9/6e+yrO5g7POd/vmZ8+/1j6OuKPwiyMxXe8xAN8Ktn3Ioiz9diJZRhaA3uPs9iH69nZGGzE4XCgjWAiDibgkpNxfhI78BUXMR8r4r2JYDYuYHwX5EznOd5gbvq3GufrBAF6GxMyw48p3DN4mv5PSenbihEtjjQSnMa6zOAmtuBZC8hkHMfChvM/CJbgcqZ4C0sRxWyTKGikc0EXghPYlBS/pLZ8UgCvCtqkNiCCaMG3iH4POYLIby/Zjv4eCotxtSpyPCMdw5PBHbwuEIRugNTnI8wirddiKLtO8iA79rf6fyMIolgHIxtcjYJfwudCGDH985LOO1yJ9yqC5WnE2zC24VCBIO/C6L5pOcFaxKQ2SQzbytRlbRyxae9jSFLYg91dCG5gVQF8dLQj5iTwb5iBnzNUpagtgrvYjIctrk/HsbQ9K5X92FV9lAhCL4p8FLGnHienpqZlF+TDMvJ7WJSvlyaC2EHjMGmQzR9RRrO8yO0qgsjzOVQFjRV8ABs6kkSEcfPFfTBAKoIIM9byqVpBY8NGPtdke6oC+JCuzL21K7ORoORoODAzpS665BUedRi+X11UIvjr8x/ntGQZQRXRUAAAAABJRU5ErkJggg==) 50% 50% no-repeat;
			background-color: transparent;
			box-shadow: none;
			-webkit-box-shadow: none;
			margin: 0 !important;
		}
		.ui-icon-custom-shuffle {
			background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAB6UlEQVRIS62Wy04UURCGv0FucT9vIT6EG4OXSBAUw0UlXFQMIeE1jKwIghK5iCKXCIEQWbCDPQ9jXCgg+ZsqUumcHmZwzmYm1ae+v/qvOt1d4mK9Bm4Bb4F/FqvmpxXYAu4WbS4ZfBrQ/xlgrJ4iggr+JlRQVxEJuIhs8lWrSAuwnbJKcK3/ERH8B9Ce6oMLXFek2eD3AvynFZw1PgrUKiL4JvAgwPeATuNm05UXKBJ5D0wGkOAbwMMQ2wUeA38slo1wSiAv8sv8PbTEJmAdeBTgO0BXgPul1iIBF3lnHkf4GtAR4JqeJwn45fRUc2K1pxH4bh57jqbnKfC30kmuRkDwb2aD71eDe4CTSoBKFnme4F+B7gBSg59dBU+Nab6YGwaXx77Ug95q4FcJCP7FbHD4KtAHnFrgjvVkHDhLWVVkkeDLZoPnqQf9ObjG86aNrYT9DHhOOSXQACyZDb5xBXge4IpPAROh6n27m98WKwMHeQHBF6xSz5XYy4QFqQfkEXAf0Ek/ANqigOCfgYFQ1SIwWORvwVP4GJDFbbHJgs8DLwJcYkMV4L41dSeXGH/hfLJK/YLEhmt4dYqTZ2QsXZgFRkLlH4HRGuBKzRrqtsRxlYDgH0xsDnhVL3jsgaC3r/lFoSlTbnKdA2OIaouuRezwAAAAAElFTkSuQmCC) 50% 50% no-repeat;
			background-color: transparent;
			box-shadow: none;
			-webkit-box-shadow: none;
			margin: 0 !important;
		}
	</style>
@stop
@section('js')
	<script src="/js/track.js"></script>
	<script>
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
		function fillLastPeriod(n) {
			if(track.ranges.length > 0) {
				$("#last-time-" + n).val(moment(track.ranges[track.ranges.length - 1].start).format("YYYY-MM-DD"));
			}
			else {
				$("#last-time-" + n).val(moment().format("YYYY-MM-DD"));
			}
		}
	</script>
	@yield('js-1')
@stop
@section('title', 'Tính thời gian thụ thai')
@section('body')
	<div class="title sub-title">
		<h1>@yield('sub-title')</h1>			
	</div>	
	<div class="note">
		<p>@yield('note')</p>
	</div>
	<div class ="content">
		@yield('form')
	</div>
@stop