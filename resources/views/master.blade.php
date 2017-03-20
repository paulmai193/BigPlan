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
		<!-- Add to home screen style -->
		<style>
			.ath-viewport *{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.ath-viewport{position:relative;z-index:2147483641;pointer-events:none;-webkit-tap-highlight-color:transparent;-webkit-touch-callout:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-text-size-adjust:none;-moz-text-size-adjust:none;-ms-text-size-adjust:none;-o-text-size-adjust:none;text-size-adjust:none}.ath-container,.ath-modal{pointer-events:auto!important}.ath-modal{background:rgba(0,0,0,.6)}.ath-mandatory{background:#000}.ath-container{position:absolute;z-index:2147483641;padding:.7em .6em;width:18em;background:#eee;background-size:100% auto;box-shadow:0 .2em 0 #d1d1d1;font-family:sans-serif;font-size:15px;line-height:1.5em;text-align:center}.ath-action-icon,.ath-container:before{background-position:50%;background-repeat:no-repeat;overflow:hidden}.ath-container small{font-size:.8em;line-height:1.3em;display:block;margin-top:.5em}.ath-ios.ath-phone{bottom:1.8em;left:50%;margin-left:-9em}.ath-ios6.ath-tablet{left:5em;top:1.8em}.ath-ios7.ath-tablet{left:.7em;top:1.8em}.ath-ios10.ath-tablet,.ath-ios8.ath-tablet,.ath-ios9.ath-tablet{right:.4em;top:1.8em}.ath-android{bottom:1.8em;left:50%;margin-left:-9em}.ath-container:before{content:'';position:relative;display:block;float:right;margin:-.7em -.6em 0 .5em;background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAACECAMAAABmmnOVAAAAdVBMVEUAAAA5OTkzMzM7Ozs3NzdBQUFAQEA/Pz8+Pj5BQUFAQEA/Pz8+Pj5BQUFAQEA/Pz9BQUE+Pj4/Pz8/Pz8+Pj4/Pz8/Pz8/Pz8+Pj4/Pz8+Pj4/Pz8/Pz8/Pz8/Pz8/Pz8+Pj4/Pz8/Pz8/Pz8/Pz9AQEA/Pz+fdCaPAAAAJnRSTlMACQoNDjM4OTo7PEFCQ0RFS6ytsbS1tru8vcTFxu7x8vX19vf4+C5yomAAAAJESURBVHgBvdzLTsJAGEfxr4C2KBcVkQsIDsK8/yPaqIsPzVlyzrKrX/5p0kkXEz81L23otc9NpIbbWia2YVLqdnhlqFlhGWpSDHe1aopsSIpRb8gK0dC3G30b9rVmhWZIimTICsvQtx/FsuYOrWHoDjX3Gu31gzJxdki934WrAIOsAIOsAIOiAMPhPsJTgKGN0BVsYIVsYIVpYIVpYIVpYIVpYIVpYIVpYIVpYIVlAIVgEBRs8BRs8BRs8BRs8BRs8BRs8BRs8BRTNmgKNngKNngKNngKNngKNhiKGxgiOlZoBlaYBlaYBlaYBlaYBlaYBlaYBlaYBlZIBlBMfQMrVAMr2KAqBENSHFHhGEABhi5CV6gGUKgGUKgGUKgGUFwuqgEUvoEVsoEVpoEUpgEUggF+gKTKY+h1fxSlC7/Z+RrxOQ3fcEoAPPHZBlaYBlaYBlaYBlZYBlYIhvLBCstw7PgM7hkiWOEZWGEaWGEaWGEaIsakEAysmHkGVpxmvoEVqoEVpoEVpoEVpoEVpoEVpoEVkoEVgkFQsEFSsEFQsGEcoSvY4CnY4CnY4CnY4CnY4CnY4CnY4CnY4CnY4CnY4CnY4CnY4CnY4CnY4CnY4CnY4CnY4CnY4CnmbNAUT2c2WAo2eAo2eAo2eAo2eAo2eArNEPFACjZ4CjZ4CjZ4CjaIird/rBvFH6llNCvewdli1URWCIakSIZesUaDoFg36dKFWk9zCZDei3TtwmCj7pC22AwikiIZPEU29IpFNliKxa/hC9DFITjQPYhcAAAAAElFTkSuQmCC);background-color:rgba(255,255,255,.8);background-size:50%;width:2.7em;height:2.7em;text-align:center;color:#a33;z-index:2147483642}.ath-container.ath-icon:before{position:absolute;top:0;right:0;margin:0;float:none}.ath-mandatory .ath-container:before{display:none}.ath-container.ath-android:before{float:left;margin:-.7em .5em 0 -.6em}.ath-container.ath-android.ath-icon:before{position:absolute;right:auto;left:0;margin:0;float:none}.ath-action-icon{display:inline-block;vertical-align:middle;text-indent:-9999em}.ath-ios10 .ath-action-icon,.ath-ios7 .ath-action-icon,.ath-ios8 .ath-action-icon,.ath-ios9 .ath-action-icon{width:1.6em;height:1.6em;background-image:url(data:image/png;base64,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);margin-top:-.3em;background-size:auto 100%}.ath-ios6 .ath-action-icon{width:1.8em;height:1.8em;background-image:url(data:image/png;base64,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);margin-bottom:.4em;background-size:100% auto}.ath-android .ath-action-icon{width:1.4em;height:1.5em;background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAANlBMVEVmZmb///9mZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZmZW6fJrAAAAEXRSTlMAAAYHG21ub8fLz9DR8/T4+RrZ9owAAAB3SURBVHja7dNLDoAgDATQWv4gKve/rEajJOJiWLgg6WzpSyB0aHqHiNj6nL1lovb4C+hYzkSNAT7mryQFAVOeGAj4CjwEtgrWXpD/uZKtwEJApXt+Vn0flzRhgNiFZQkOXY0aADQZCOCPlsZJ46Rx0jhp3IiN2wGDHhxtldrlwQAAAABJRU5ErkJggg==);background-size:100% auto}.ath-container p{margin:0;padding:0;position:relative;z-index:2147483642;text-shadow:0 .1em 0 #fff;font-size:1.1em}.ath-ios.ath-phone:after,.ath-ios.ath-tablet:after{content:'';background:#eee;position:absolute;width:2em;height:2em;left:50%;margin-left:-1em}.ath-ios.ath-phone:after{bottom:-.9em;-webkit-transform:scaleX(.9) rotate(45deg);transform:scaleX(.9) rotate(45deg);box-shadow:.2em .2em 0 #d1d1d1}.ath-ios.ath-tablet:after{top:-.9em;-webkit-transform:scaleX(.9) rotate(45deg);transform:scaleX(.9) rotate(45deg);z-index:2147483641}.ath-application-icon{position:relative;padding:0;border:0;margin:0 auto .2em;height:6em;width:6em;z-index:2147483642}.ath-container.ath-ios .ath-application-icon{border-radius:1em;box-shadow:0 .2em .4em rgba(0,0,0,.3),inset 0 .07em 0 rgba(255,255,255,.5);margin:0 auto .4em}@media only screen and (orientation:landscape){.ath-container.ath-phone{width:24em}.ath-android.ath-phone,.ath-ios.ath-phone{margin-left:-12em}.ath-ios6:after{left:39%}.ath-ios8.ath-phone{left:auto;bottom:auto;right:.4em;top:1.8em}.ath-ios8.ath-phone:after{bottom:auto;top:-.9em;left:68%;z-index:2147483641;box-shadow:none}}
		</style>
		<link rel="stylesheet" href="/css/core.css">
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
		<!-- Add to home screen plugin -->
		<script src="{{ URL::asset('/js/add2home.js') }}"></script>
		<script>
			addToHomescreen({
				skipFirstVisit: true,
				maxDisplayCount: 1,
				appID: 'logia.bigplan',
				debug: true,
			});
		</script>
		<!--- Init global script -->
		<script>
			// Global setting for MomentJS Locale
			moment.locale("{{ config('app.locale') }}")
			
			jQuery.ajaxSetup({cache:true});
		</script>
		<script src="{{ URL::asset('/js/track.js') }}"></script>
	</head>
	<body>
		<div data-role="page" id="main-page">
			@yield('css')
			<script>
				$(document).on("pagecreate", function() {
					// grab an element
					$(".ui-header").headroom();
				});
			</script>
			@yield('js')
			<div data-role="header" data-position="fixed" data-tap-toggle="false" data-headroom>
				<a href="#nav-menu" data-icon="custom-bars" data-iconpos="notext" class="ui-nodisc-icon">Menu</a>
				<h1 class="page-header-left">Big Plan | @yield('title')</h1>
				@yield('navigator')
			</div>
			<div data-role="main" class="ui-content">
				@yield('body')
			</div>
			<div data-role="panel" data-display="push" data-theme="a" id="nav-menu">
				<ul data-role="listview">
					<li><h4>Menu</h4></li>
					<li><a href="/method/1" class="ui-btn ui-btn-icon-left ui-nodisc-icon ui-icon-custom ui-icon-custom-calculator">Tính thời gian thụ thai</a></li>
					<li><a href="/track/calendar" class="ui-btn ui-btn-icon-left ui-nodisc-icon ui-icon-custom ui-icon-custom-calendar">Theo dõi chu kỳ</a></li>
					<li><a href="/faq" class="ui-btn ui-btn-icon-left ui-nodisc-icon ui-icon-custom ui-icon-custom-faq">FAQ</a></li>
				</ul>
			</div>
		</div>
	</body>
</html>