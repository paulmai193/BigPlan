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
		<style type="text/css">
			html { background-color: #333; }
			@media only screen and (min-width: 720px){
				.ui-content {
					width: 720px !important;
					margin: 0 auto !important;
					position: relative !important;
				}
			}
			@media ( min-width: 40em ) {
				/* Show the table header rows and set all cells to display: table-cell */
				.my-custom-breakpoint td,
				.my-custom-breakpoint th,
				.my-custom-breakpoint tbody th,
				.my-custom-breakpoint tbody td,
				.my-custom-breakpoint thead td,
				.my-custom-breakpoint thead th {
					display: table-cell;
					margin: 0;
				}
				/* Hide the labels in each cell */
				.my-custom-breakpoint td .ui-table-cell-label,
				.my-custom-breakpoint th .ui-table-cell-label {
					display: none;
				}
			}
			body {
				font-family: 'Montserrat', sans-serif !important;			
				font-size: 100%;
			}
			.center {
				text-align: center !important;
				margin: 0 auto !important;
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
			.headroom {
				//will-change: transform;
				transition: transform 200ms linear;
			}
			.headroom--pinned {
				transform: translateY(0%);
			}
			.headroom--unpinned {
				transform: translateY(-100%);
			}
			.highlight.bold {
				font-weight: bold;
			}
			.highlight.italic {
				font-style: italic;
			}
			.left {
				text-align: left !important;
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
				max-width: 500px
			}
			.right {
				text-align: right !important;
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
			.ui-icon-custom {
				box-shadow: none;
                -webkit-box-shadow: none;
                margin: 0 !important;
			}
			.ui-icon-custom-bars {
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAQCAYAAAAMJL+VAAAAOklEQVQ4T2NkYGD4z0BDwEgPC1bQ0AMMIB/QFAwPCyJoGUZ0SUU0zwchtA4iWpo/TPLBGlqG0dBPpgDFxAgLVsoz4QAAAABJRU5ErkJggg==) 50% 50% no-repeat;
                background-color: transparent !important;
				box-shadow: none;
                -webkit-box-shadow: none;
                margin: 0 !important;
            }
			.ui-icon-custom.ui-icon-custom-calculator {
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAqUlEQVRIS+3WSwrCMBCA4a8X0aXH0IV4KsGKeChd6TV0I3gRqaZQbIt9Wipmk2SSzJ/MI0nkVWY4YhL6bas7lrhEQdMau7Za39YnOvcpIMamY8AWcRHgOdAQlt3oDwMaWie3rNRE4wdkoygXFeF4leWfwrSyojLwIIDenXzGKVAWmId2XXmlTB6nD+qaomz+cJn8T7T0ZfyuD3p/9JNvywHTju6JG1a4PgAY7XQZVE4umgAAAABJRU5ErkJggg==) 5% 50% no-repeat;
                background-color: transparent;
            }
			.ui-icon-custom.ui-icon-custom-calendar {
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABOklEQVRIS+3WvytFcRgG8M/FqIzKj7IoUTIYlMkkEgOjQdn8KIu/A6UYSFll8aNMSsooSRlFBmUyE/rW997OPU7n3HLH+47n+7zP0/uc53zfU/K3OnCMEXxiH8v4TkGbsYsFtOAGs3hL4koZAntYxCXaMYAZnKSwczjCA94xhh0sFQlcYBxNmIrEq9hOCaxhA5MIPWHC89hTgZYnGMZ8HHUa3QhnQeAU17hPCQxhFBNR4AfPOMMXDnEbSNrwitYUQVIgw8nKo6RAEveBrkDSh8cMhv8KBMrePIED9MSXlzdBCMNLTFMalyuQR1rrWZXAHa5q7SzAhcgOpi3aQohePSpEOnycVRM0BJLWNiwqDFrDooZFhQ4UAqpSFO78p3inZy2eQrYMQH9cu53lnbyJFYRfkXpU2MmBc/0XQHlfo6VyA+AAAAAASUVORK5CYII=) 5% 50% no-repeat;
                background-color: transparent;
            }
			.ui-icon-custom.ui-icon-custom-faq {
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAEFklEQVRIS41WXWgcVRT+zp3NttA8WNKKtWbmzs5iJXkQoS/iS1qlokg0WNPYGn/w90lBrTXpg+BPaypYEH+qYP1pNT9K0YpKEUreTV7EhVZnZ+9sNkoN/oAtjdmdc2Sm3bC72d10noa533e+c757z7lDaPNscRw3IhoCsE0Evcy8MYYrpRaIkGPgtBCNFwqFsFUYaragtdYWMAbBzjheuyQAMIApsdS+IAiKjdgVAlnbfYBJjhCwDkAEwrci8rUoNWNZ1u9xgCiKNhHzVgUMCOjOOAmGnCeiJwJjxmtF6gQ8x90LyKEEwPheRD0TlIJf21Xguu4WiqK3iNSOGEeQ5/wwfLPKWRaIMxeSYwmIMOobc3AVa+oS9Rx3PyCvJB8J9+eNmbj0CiD2XAl+jm0RwkhgzOs1bPIcpw/AdiaySagMkpnOixeP/XTu3IVaFc9x9gP0amyXSqV68vn8XCLgaT0FwX1C+CYwpr+OZNtHQOrJFdUIn+2IolvOzM//WYfv1t9B4Q4A4/nQ7Kb4KFZAPjNHYqnrjTGmlpCx7VuJ6B4AJ6wo+qXc0bEBkbynCDcT4WXfmJdq8dnubi9S6owCKVaUoazjjAroNRCm8sbsuhLfPa13QTDBwpOFYjHuk7on67hfCuReCPbF/v4A0G0kNOgXC19coUDcIy+I4GBQNKONHE/rIQjGIXyKPEf/BmBTRHAb7WkmltH6KRK8A+aFiqKbwjBMeqPRJlGWz5ASud32klKqY23nujW5XG6pXQWe4xwCaC9DfCh1V6FQONsMn81m10i5ssjMS8sCV23oSs/OzpZbCWRdd4ewnALhxzLz7cVi8e9W2N7e3vTi+Qv/JQKeo+cBXEuVVLc/75dakTK2PkCEESJs842ZbldpJpOxKeIwsWh5k5nu9ucKJ1sRXde9kSLpW7+x6912lSZ95TgDAJ1INjmr9YgIDgjowyAsPNYusz70paYxXVntpHm2/giEh5NjmoxmQR7AInWktO/7C80CXO72nQA9nQ8Lb7cS0VpfYwkCAGmxVKY6KiYhGCTGUX/OPNpU4DrbwFJOdQS0tFLrT5TgQWJ87s+ZPYmA67oOseTiYUdCw36xcHzl2Xb7WaFfSXTYLxZzLap8CIKPWfhfK0r3xIdmeVxnHGcPgY4zc5kUPRKE4WereV3XXLY7HBEfVaAUCEN5Yybj9cYL53lA3ogXmPBBuVIZKZVKf7UTumHz5q6lVHqMIIm1RHjWN+ZwlbPiysw4zm4B3legzrhUIutTCH3FimeMMf/ERNu211uwtlokAxFkuIpVSj1ezbylQLxwuVHGAAzWXfqMxYSosLamqogYk5K2XowvmMZqm/5VVEHJ5kcyBPB2IeoBy9WXBOgPJZID1GlJqYlmfxPVGP8D3aTROADOxw4AAAAASUVORK5CYII=) 5% 50% no-repeat;
                background-color: transparent;
            }
			#main-page * {
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				-o-user-select: none;
				user-select: none;
			}
		</style>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
		<script src="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script src="//momentjs.com/downloads/moment.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/vi.js"></script>
		<script>
			// Global setting for MomentJS Locale
			moment.locale("{{ config('app.locale') }}")
			
			// Track tool
			"use strict";function initData(){var a;$.each(track.ranges,function(b,c){if("undefined"!=typeof a){var d=moment(c.start).diff(moment(a),"days");track.shortestPeriod>d&&(track.shortestPeriod=d),track.longestPeriod<d&&(track.longestPeriod=d)}d=moment(c.end).diff(moment(c.start),"days")+1,track.shortestMenstruation>d&&(track.shortestMenstruation=d),track.longestMenstruation<d&&(track.longestMenstruation=d),a=c.start})}function sortData(a){a.sort(function(a,b){return a.start>b.start?1:a.start<b.start?-1:0})}var PERIOD_RANGES=("period-ranges"),PERIOD_CURRENT=("period-current"),track={TODAY:moment(new Date).format("YYYY-MM-DD"),ranges:null,currentPeriod:null,shortestPeriod:46,longestPeriod:0,shortestMenstruation:21,longestMenstruation:0};"undefined"!=typeof Storage?(track.ranges=localStorage.getItem(PERIOD_RANGES),null===track.ranges?track.ranges=[]:(track.ranges=JSON.parse(track.ranges),sortData(track.ranges),initData()),track.currentPeriod=localStorage.getItem(PERIOD_CURRENT),null!==track.currentPeriod&&(track.currentPeriod=+track.currentPeriod)):alert("Sorry! No Web Storage support.."),track.updatePeriod=function(a,b){var d,c=1;if(track.ranges.length>0&&(d=track.ranges[track.ranges.length-1],c=d.id+1),null!==track.currentPeriod){c=track.currentPeriod;var e=track.findPreriodById(c);""===b&&(b=a,a=track.ranges[e].start),track.ranges[e]={id:c,start:a,end:b}}else{var e=track.findPeriodByStartDay(a);e>0&&(a=track.ranges[e].start,c=track.ranges[e].id),""===b&&(b=a),track.TODAY>=a&&track.TODAY<=b&&(track.currentPeriod=c),track.ranges.push({id:c,start:a,end:b})}if("undefined"!=typeof d){var f=moment(a).diff(moment(d.start),"days");(""===track.shortestPeriod||track.shortestPeriod>f)&&(track.shortestPeriod=f),(""===track.longestPeriod||track.longestPeriod<f)&&(track.longestPeriod=f)}"undefined"!=typeof Storage&&(localStorage.setItem(PERIOD_RANGES,JSON.stringify(track.ranges)),null!==track.currentPeriod&&localStorage.setItem(PERIOD_CURRENT,track.currentPeriod))},track.removeCurrentPeriod=function(){track.currentPeriod=null,localStorage.removeItem(PERIOD_CURRENT)},track.findPreriodById=function(a){return track.ranges.findIndex(function(b){return b.id==a})},track.findPeriodByStartDay=function(a){return track.ranges.findIndex(function(b){return b.start==a})};
		</script>
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
				<input name="date-begin" id="date-begin" type="text" value="<?php echo date('Y-m-d') ?>" required>
				<!--<input name="date-begin" id="date-begin" type="text" data-role="date">-->
				<div id="more-input-d" hidden>
					<label for="date-end" id="lb-end">Đến ngày</label>
					<input name="date-end" id="date-end" type="text" novalidate>
					<!--<input name="date-end" id="date-end" type="text" data-role="date">-->
				</div>	
				<div>
					<a href="#" id="more-input-a">Mở rộng</a>
				</div>
				<div class="ui-grid-a center">
					<div class="ui-block-a">
						<!--<a href="#" class="ui-btn ui-icon-check ui-btn-icon-left">Đồng ý</a>-->
						<input type="submit" class="ui-icon-check ui-btn-icon-left" value="Đồng ý">
					</div>
					<div class="ui-block-b">
						<a href="#" data-rel="back" class="ui-btn ui-nodisc-icon ui-corner-all">Hủy bỏ</a>
					</div>
				</div>
			</form>
			<script>
				$(document).on("pagecreate", function() {
var showDateFormat = "DD/MMM/YYYY",
    saveDateFormat = "YYYY-MM-DD",
    defaultDatepickerFormat = "DD/MM/YYYY",
    mainOptions = {
        numberOfMonths: 1,
        changeMonth: !1,
        regional: "{{ config('app.locale') }}",
        onSelect: function(a) {
            $(this).val(moment(a, defaultDatepickerFormat).format(showDateFormat))
        }
    },
    periodCalendarOptions = mainOptions;
periodCalendarOptions.beforeShowDay = function(a) {
    for (var a = moment(a, defaultDatepickerFormat).format(saveDateFormat), b = 0; b < track.ranges.length; b++)
        if (a >= track.ranges[b].start && a <= track.ranges[b].end) return "undefined" != typeof current && current.id === track.ranges[b].id ? [!0, "ui-state-current", "Ngày hành kinh"] : [!0, "ui-state-highlight", "Ngày hành kinh"];
    return [!0, ""]
};
var pickupBeginOptions = periodCalendarOptions;
pickupBeginOptions.onSelect = function(a) {
    $("#date-end").datepicker("option", "minDate", a), $(this).val(moment(a, defaultDatepickerFormat).format(showDateFormat))
}, $("#date-begin").datepicker(pickupBeginOptions).on("input change", function(a) {
    $("#date-end").datepicker("option", "minDate", value)
}).val(moment().format(showDateFormat));
var pickupEndOptions = periodCalendarOptions;
$("#date-end").datepicker(pickupEndOptions).val(moment().format(showDateFormat));
var current;
null !== track.currentPeriod && (current = track.ranges[track.findPreriodById(track.currentPeriod)], $("#check-finish-d").removeAttr("hidden")), $("#more-input-a").on("tap", function() {
    $("#lb-begin").empty(), $("#lb-begin").append("Từ ngày"), $("#date-end").val($("#date-begin").val()), $("#more-input-d").removeAttr("hidden"), $("#date-end").removeAttr("novalidate"), $("#date-end").prop("required", !0), $("#more-input-a").prop("hidden", !0)
}), $("#check-finish-i").click(function() {
    $("#more-input-a").toggle(!this.checked), $("#lb-begin").toggle(!this.checked), $("#date-begin").toggle(!this.checked), $("#lb-end").toggle(!this.checked), $("#date-end").toggle(!this.checked)
}), $("#form").submit(function(a) {
    a.preventDefault(), $("#check-finish-i-1").is(":checked") && null !== track.currentPeriod ? track.removeCurrentPeriod() : track.updatePeriod(moment($("#date-begin").val(), showDateFormat).format(saveDateFormat), "" !== $("#date-end").val() ? moment($("#date-end").val(), showDateFormat).format(saveDateFormat) : ""), location.reload()
});
				});
			</script>			
		</div>
	</body>
</html>