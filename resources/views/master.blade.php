<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<title>Big Plan - @yield('title')</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style type="text/css">
			html { background-color: #333; }
			@media only screen and (min-width: 640px){
				.ui-content {
					width: 640px !important;
					margin: 0 auto !important;
					position: relative !important;
				}
			}
			body {
				font-family: 'Montserrat', sans-serif !important;			
				font-size: 100%;
			}
			.center {
				text-align: center;
				margin: auto;
			}
			.content.just-text {
				text-align: justify;
			}
			.page-header-left {
				text-align: left !important;
				margin-left: 40px !important;
				font-weight: bold;
			}
			.customButton {
				background-color: transparent !important;
				border: 0 !important;
				-webkit-box-shadow: none;
				box-shadow: none;
			}
			.highlight.bold {
				font-weight: bold;
			}
			.highlight.italic {
				font-style: italic;
			}
			.navigator-active {
				background-color: #38c !important;
				border-color: #38c !important;
				color: #fff !important;
				text-shadow: 0 1px 0 #059 !important;
			}
			.note {
				font-style: italic;				
			}
			.popup {
				padding:10px 20px;
				max-width: 450px
			}
			.title {
				align-items: center;
				display: flex;
				justify-content: center;
			}
			.title.main {
				text-align: center;
				font-size: 5em;				
				margin: auto;
			}
			.title.sub-title {
				text-align: center;
				font-size: 0.8em;
			}
			.ui-content {
				color: #636b6f;			
			}
			#main-page * {
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				-o-user-select: none;
				user-select: none;
			}			
			
		</style>
		<link rel="manifest" href="/manifest.json">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<!--<link href="/css/app.css" rel="stylesheet" type="text/css">-->
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<!--<link rel="stylesheet" href="https://rawgithub.com/arschmitz/jquery-mobile-datepicker-wrapper/master/jquery.mobile.datepicker.css" />-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script src="https://rawgithub.com/jquery/jquery-ui/1-10-stable/ui/jquery.ui.datepicker.js"></script>
		<script src="https://rawgithub.com/arschmitz/jquery-mobile-datepicker-wrapper/master/jquery.mobile.datepicker.js"></script>
		<script src="https://momentjs.com/downloads/moment.min.js"></script>
		
	</head>
	<body>
		<div data-role="page" id="main-page">
			<div data-role="header">
				<a href="#nav-menu" data-icon="bars" data-iconpos="notext">Menu</a>
				<h1 class="page-header-left">Big Plan | @yield('title')</h1>
				@yield('navigator')
			</div>
			<div data-role="main" class="ui-content">
				@yield('body')
			</div>
			<div data-role="panel" data-display="push" data-theme="a" id="nav-menu">
				<ul data-role="listview">
					<li><h4>Menu</h4></li>
					<li><a href="/method/1" class="ui-btn ui-icon-clock ui-btn-icon-left">Tính thời gian thụ thai</a></li>
					<li><a href="/track/calendar" class="ui-btn ui-icon-calendar ui-btn-icon-left">Theo dõi chu kỳ</a></li>
					<li><a href="/faq" class="ui-btn ui-icon-info ui-btn-icon-left">FAQ</a></li>
				</ul>
			</div>
		</div>
	</body>
</html>