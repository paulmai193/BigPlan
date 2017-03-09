@extends('track.track')
@section('css-1')
	<style>
		#period-calendar {
			display: inline-block;
			margin: 0 auto;
		}
		.ui-state-highlight .ui-state-default {
			background-color: #ffe4e1;
		}
		.ui-state-current .ui-state-default {
			background-color: #ffc0cb;
		}
	</style>
@stop
@section('js-1')
	<script>
		$(document).on("pagecreate", function() {
			// Prepare UI
			// Period calendar
			var mainOptions = {
				numberOfMonths: 1,
				dateFormat: "yy-mm-dd",
				changeMonth: false,
			};
			var periodCalendarOptions = mainOptions;
			periodCalendarOptions["beforeShowDay"] = function(date) {
					var date = moment(date).format("YYYY-MM-DD");
					for(var i=0; i<track.ranges.length; i++) {
						if(date >= track.ranges[i].start && date <= track.ranges[i].end) {
							if(track.TODAY >= track.ranges[i].start && track.TODAY <= track.ranges[i].end) {
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
			$("#period-calendar").datepicker(periodCalendarOptions);
			// Modify add new period popup
			if(track.currentPeriod !== null) {
				showCheckFinishPeriod(1);
			}
			// Action of changing date-begin input
			$("#date-begin-" + 1).change(function() {
				updateCondition(1);
			});
			// Action of tapping to more-input-a button
			$("#more-input-a-" + 1).on("tap", function() {
				showMoreOptions(1);
			});
			// Action of tapping to btn-close button
			$("#btn-close-" + 1).on("tap", function() {
				closePopup(1);
			});
			// Action of checked check-finish checkbox
			$('#check-finish-i-' + 1).click(function() {
				hidePopupInput(this, 1);
			});
			// Action of submit update period form event
			$("#form-" + 1).submit(function( event ) {
				event.preventDefault();
				if($('#check-finish-i-' + 1).is(':checked') && track.currentPeriod !== null) {
					removeCurrentPeriod()
				}
				else {
					updatePeriod($("#date-begin-" + 1).val(), $("#date-end-" + 1).val())
				}
				location.reload();
			});
		})
	</script>
@stop
@section('navigator')
	<div data-role="navbar">
		<ul>
			<li><a href="/track/calendar" data-icon="custom-calendar" class="ui-nodisc-icon ui-btn-active ui-state-persist" id="nav-1"></a></li>
			<li><a href="/track/statistic" data-icon="custom-statistic" class="ui-nodisc-icon" id="nav-2"></a></li>
		</ul>
	</div>	
@stop
@section('sub-title', 'Lịch kinh nguyệt')
@section('form')
	<div class="content center">
		<div id="period-calendar" data-inline="true"></div>
	</div>
	<br>
	<!-- Update period -->
	<div class ="content">
		<div class="ui-grid-b">
			<div class="ui-block-a"></div>
			<div class="ui-block-b" center>
				<a href="#popup-add-1" data-rel="popup" data-transition="slideup" data-position-to="window" class="ui-btn ui-btn-icon-top ui-nodisc-icon ui-icon-custom-add" id="open-popup-add"></a>
			</div>
			<div class="ui-block-c"></div>
		</div>
		<!-- Add new period popup -->
		<div data-role="popup" id="popup-add-1">
			<form data-role="content" class="popup" id="form-1">
				<div id="check-finish-d-1" hidden>
					<label>
						<input type="checkbox" name="check-finish" id="check-finish-i-1">Kết thúc chu kỳ
					</label>					
				</div>
				<label for="date-begin" id="lb-begin-1">Ngày</label>
				<input name="date-begin" id="date-begin-1" type="date" value="<?php echo date('Y-m-d') ?>" required>
				<!--<input name="date-begin" id="date-begin" type="text" data-role="date">-->
				<div id="more-input-d-1" hidden>
					<label for="date-end" id="lb-end-1">Đến ngày</label>
					<input name="date-end" id="date-end-1" type="date" novalidate>
					<!--<input name="date-end" id="date-end" type="text" data-role="date">-->
				</div>	
				<div>
					<a href="#" id="more-input-a-1">Mở rộng</a>
				</div>
				<div class="ui-grid-a center">
					<div class="ui-block-a">
						<!--<a href="#" class="ui-btn ui-icon-check ui-btn-icon-left">Đồng ý</a>-->
						<input type="submit" class="ui-icon-check ui-btn-icon-left" value="Đồng ý">
					</div>
					<div class="ui-block-b">
						<!--<a href="#" data-rel="back" class="ui-btn ui-icon-delete ui-btn-icon-left">Hủy bỏ</a>-->
						<input type="button" class="ui-icon-delete ui-btn-icon-left" value="Hủy bỏ" id="btn-close-1">
					</div>
				</div>
			</form>
		</div>
	</div>
@stop