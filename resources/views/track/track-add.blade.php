<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" manifest="/bigplan-manifest.appcache">
	<head>
		<title>Big Plan</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="manifest" href="/manifest.json">
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
		<link rel="stylesheet" href="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" href="/css/core.min.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
		<script src="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script src="//momentjs.com/downloads/moment.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/vi.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/headroom/0.9.3/headroom.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/headroom/0.9.3/jQuery.headroom.min.js"></script>
		<!-- Google analytics -->
		<script>
			!function(a,b,c,d,e,f,g){a.GoogleAnalyticsObject=e,a[e]=a[e]||function(){(a[e].q=a[e].q||[]).push(arguments)},a[e].l=1*new Date,f=b.createElement(c),g=b.getElementsByTagName(c)[0],f.async=1,f.src=d,g.parentNode.insertBefore(f,g)}(window,document,"script","https://www.google-analytics.com/analytics.js","ga"),ga("create","UA-93774605-1","auto"),ga("send","pageview");
		</script>
		<!-- Date picker Vi Locale -->
		<script>
			jQuery(function(a){a.datepicker.regional["vi"]={closeText:"Đóng",prevText:"Trước",nextText:"Sau",currentText:"Hôm nay",monthNames:["Tháng một","Tháng hai","Tháng ba","Tháng tư","Tháng năm","Tháng sáu","Tháng bảy","Tháng tám","Tháng chín","Tháng mười","Tháng mười một","Tháng mười hai"],monthNamesShort:["Một","Hai","Ba","Bốn","Năm","Sáu","Bảy","Tám","Chín","Mười","Mười một","Mười hai"],dayNames:["Chủ nhật","Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy"],dayNamesShort:["CN","Hai","Ba","Tư","Năm","Sáu","Bảy"],dayNamesMin:["CN","T2","T3","T4","T5","T6","T7"],weekHeader:"Tuần",dateFormat:"dd/mm/yy",firstDay:1,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""},a.datepicker.setDefaults(a.datepicker.regional["vi"])});
		</script>
		<!--- Init global script -->
		<script>
			// Global setting for MomentJS Locale
			moment.locale("{{ config('app.locale') }}")
			
			jQuery.ajaxSetup({cache:true});
		</script>
		<script src="{{ URL::asset('/js/core.min.js') }}"></script>
	</head>
	<body>
		<!-- Add new period dialog -->
		<div data-role="dialog" id="dialog-add">
			<form data-role="content" id="form" class="dialog">
				<div id="check-finish-d" hidden>
					<label>
						<input type="checkbox" name="check-finish" id="check-finish-i">Kết thúc chu kỳ
					</label>					
				</div>
				<label for="date-begin" id="lb-begin">Ngày</label>
				<input name="date-begin" id="date-begin" type="text" value="<?php echo date('Y-m-d') ?>" autocomplete="off" required>
				<div id="more-input-d" hidden>
					<label for="date-end" id="lb-end">Đến ngày</label>
					<input name="date-end" id="date-end" type="text" autocomplete="off" novalidate>
				</div>	
				<div>
					<a href="#" id="more-input-a">Mở rộng</a>
				</div>
				<div class="ui-grid-a center">
					<div class="ui-block-a" id="zone-submit">
						<input type="submit" class="ui-icon-check ui-btn-icon-left" value="Thêm" id="btn-submit">
					</div>
					<div class="ui-block-b">
						<a href="#" data-rel="back" class="ui-btn ui-nodisc-icon ui-corner-all">Hủy bỏ</a>
					</div>
				</div>
			</form>
			<script src="{{ URL::asset('/js/track-add.ob.js') }}"></script>
		</div>
	</body>
</html>