@extends('master')

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
		<br>
		<!-- Update period -->
		<div class ="content">
			<div class="ui-grid-b center">
				<div class="ui-block-a"></div>
				<div class="ui-block-b">
					<a href="#popup-add" data-rel="popup" data-transition="slideup" data-position-to="window" class="ui-btn ui-icon-plus ui-btn-icon-left" id="open-popup-add">Thêm chu kỳ</a>
				</div>
				<div class="ui-block-c"></div>			
			</div>
			<div data-role="popup" id="popup-add">
				<form data-role="content" class="popup">
					<div id="check-finish-d" hidden>
						<label>
							<input type="checkbox" name="check-finish" id="check-finish-i">Kết thúc chu kỳ
						</label>					
					</div>
					<label for="date-begin" id="lb-begin">Ngày</label>
					<input name="date-begin" id="date-begin" type="date" required>
					<!--<input name="date-begin" id="date-begin" type="text" data-role="date">-->
					<div id="more-input-d" hidden>
						<label for="date-end" id="lb-end">Đến ngày</label>
						<input name="date-end" id="date-end" type="date" novalidate>
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
							<!--<a href="#" data-rel="back" class="ui-btn ui-icon-delete ui-btn-icon-left">Hủy bỏ</a>-->
							<input type="button" class="ui-icon-delete ui-btn-icon-left" value="Hủy bỏ" id="btn-close">
						</div>
					</div>
				</form>
			</div>
		</div>	
		<script>
			var PERIOD_RANGES = "period-ranges", PERIOD_CURRENT = "period-current", PERIOD_SHORTEST = "period-shortest", PERIOD_LONGEST = "period-longest";
			var TODAY = moment(new Date()).format("YYYY-MM-DD");
			
			// Ranges variable, allow update overtime. Each object in ranges must be {id: number, start: yyyy-mm-dd, end: yyyy-mm-dd}
			var ranges;
			
			// ID of current period, and number days of shortest / longest period
			var currentPeriod, shortestPeriod, longestPeriod;
			   
			// Load period dates from local storage
			if (typeof(Storage) !== "undefined") {
				ranges = localStorage.getItem(PERIOD_RANGES);
				if(ranges === null) {
					ranges = []
				}
				else {
					ranges = JSON.parse(ranges);
				}
				currentPeriod = localStorage.getItem(PERIOD_CURRENT);
				if(currentPeriod === null) {
					currentPeriod = "";
				}
				shortestPeriod = localStorage.getItem(PERIOD_SHORTEST);
				if(shortestPeriod === null) {
					shortestPeriod = "";
				}
				longestPeriod = localStorage.getItem(PERIOD_LONGEST);
				if(longestPeriod === null) {
					longestPeriod = "";
				}
			} else {
				alert("Sorry! No Web Storage support..");
			}

			// Prepare UI
			if(currentPeriod !== "") {
				// Update text for button open add new period popup
				$("#open-popup-add").empty();
				$("#open-popup-add").append("Cập nhật chu kỳ");

				// Show close current period option
				$("#check-finish-d").removeAttr("hidden");
			}

			// Initialize option for datepicker
			var mainOptions = {
				numberOfMonths: 1,
				dateFormat: "yy-mm-dd",
				changeMonth: false,
			};
			var periodCalendarOptions = mainOptions;
			periodCalendarOptions["beforeShowDay"] = function(date) {
					var date = moment(date).format("YYYY-MM-DD");
					for(var i=0; i<ranges.length; i++) {
						if(date >= ranges[i].start && date <= ranges[i].end) {
							if(TODAY >= ranges[i].start && TODAY <= ranges[i].end) {
								return [true, "ui-state-current", "Ngày hành kinh"];
							}
							else {
								return [true, "ui-state-highlight", "Ngày hành kinh"];
							}
						}
					}
					return [true, ""];
				};
				
			var pickupCalendarOptions = mainOptions;
			pickupCalendarOptions["defaultDate"] = "+1w";
			
			// Period calendar
			$( "#period-calendar" ).datepicker(periodCalendarOptions);

			// Pickup period date
			var dateBeginOptions = pickupCalendarOptions;
			dateBeginOptions["onSelect"] = function(dateText, inst) {
				console.log($(this));
				to.datepicker( "option", "minDate", getDate( this ) );
            };
			/*var from = $( "#date-begin" )
				.datepicker(dateBeginOptions)
				.on( "change", function() {
					to.datepicker( "option", "minDate", getDate( this ) );
				}).click(function(){$(this).focus()});

			var dateEndOptions = pickupCalendarOptions;
			dateEndOptions["onSelect"] = function(dateText, inst) {
				console.log($(this));
				from.datepicker( "option", "maxDate", getDate( this ) );
            };
			var to = $( "#date-end" ).datepicker(dateEndOptions)
				.on( "change", function() {
					from.datepicker( "option", "maxDate", getDate( this ) );
				}).click(function(){$(this).focus()});*/

			// Action of submit update period form event
			$( "form" ).submit(function( event ) {
				event.preventDefault();
				updatePeriod();
				
				location.reload();
			});

			// Action of changing date-begin input
			$( "#date-begin" ).change(function() {
				updateCondition();
			});

			// Action of tapping to more-input-a button
			$( "#more-input-a" ).on("tap", function() {
				$("#lb-begin").empty();
				$("#lb-begin").append("Từ ngày");
				$("#date-end").val($("#date-begin").val());
				$("#more-input-d").removeAttr("hidden");
				$("#date-end").removeAttr("novalidate");
				$("#date-end").prop('required',true);
				$("#more-input-a").prop('hidden',true);
			});

			// Action of tapping to btn-close button
			$( "#btn-close" ).on("tap", function() {
				$("#popup-add").popup("close");
			});

			// Action of checked check-finish checkbox
			$('#check-finish-i').click(function() {
				$("#more-input-a").toggle(!this.checked);
				$("#lb-begin").toggle(!this.checked);
				$("#date-begin").toggle(!this.checked);
				$("#lb-end").toggle(!this.checked);
				$("#date-end").toggle(!this.checked);
			});
			
			function updatePeriod() {
				if($('#check-finish-i').is(':checked') && currentPeriod !== "") {
					localStorage.removeItem(PERIOD_CURRENT);
				}
				else {
					var start = $("#date-begin").val();
					var end = $("#date-end").val();
					
					// Set ranges
					var id = 1;
					var lastPeriod;
					if(ranges.length > 0) {
						lastPeriod = ranges[ranges.length - 1];
						id = lastPeriod.id + 1;
					}
					if(currentPeriod !== "") {
						// If current period is set, update this period start / end time
						id = currentPeriod;
						var i = findPreriodById(ranges, id);
						if(end === "") {
							// In case user just enter start day, that mean set it into end day
							end = start;
							start = ranges[i].start;
						}
						ranges[i] = {"id": id, "start": start, "end": end};
					}
					else {
						if(end === "") {
							// In case user just enter start day, that mean start = end day
							end = start;
						}
						// If current period not set
						if(TODAY >= start && TODAY <= end) {
							// Set this id to current
							currentPeriod = id;
						}
						ranges.push({"id": id, "start": start, "end": end});
					}
					$( "#datepicker" ).datepicker("setDate", "0");
					
					// Statistic
					if(typeof(lastPeriod) !== "undefined") {
						var delta = moment(start).diff(moment(lastPeriod.start), "days");
						if(shortestPeriod === "" || shortestPeriod > delta) {
							shortestPeriod = delta;
						}
						if(longestPeriod === "" || longestPeriod < delta) {
							longestPeriod = delta;
						}
					}
					
					// Save to localStorage
					if (typeof(Storage) !== "undefined") {
						localStorage.setItem(PERIOD_RANGES, JSON.stringify(ranges));
						localStorage.setItem(PERIOD_CURRENT, currentPeriod);
						localStorage.setItem(PERIOD_SHORTEST, shortestPeriod);
						localStorage.setItem(PERIOD_LONGEST, longestPeriod);
					}
				}
			}
			
			function updateCondition() {
				$("#date-end").attr("min", $("#date-begin").val());
			}
			
			function findPreriodById(ranges, id){
				return ranges.findIndex(x => x.id==id);
			}
			
			function getDate( element ) {
				var date;
				try {
					date = $.datepicker.parseDate( dateFormat, element.value );
				} catch( error ) {
					date = null;
				}
				return date;
			}
		</script>
	@endif
@stop