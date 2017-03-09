@extends('track.track')
@section('js-1')
	<script>
		$(document).ready(function() {
			$("#stats-shortest-period").html(" -- " + track.shortestPeriod);
			$("#stats-longest-period").html(" -- " + track.longestPeriod);
			// Modify add new period popup
			if(track.currentPeriod !== "") {
				showCheckFinishPeriod(2);
			}
			// Action of changing date-begin input
			$("#date-begin-" + 2).change(function() {
				updateCondition(2);
			});
			// Action of tapping to more-input-a button
			$("#more-input-a-" + 2).on("tap", function() {
				showMoreOptions(2);
			});
			// Action of tapping to btn-close button
			$("#btn-close-" + 2).on("tap", function() {
				closePopup(2);
			});
			// Action of checked check-finish checkbox
			$('#check-finish-i-' + 2).click(function() {
				hidePopupInput(2);
			});
			// Action of submit update period form event
			$("#form-" + 2).submit(function( event ) {
				event.preventDefault();
				if($('#check-finish-' + 1).is(':checked') && track.currentPeriod !== "") {
					removeCurrentPeriod()
				}
				else {
					updatePeriod($("#date-begin-" + 2).val(), $("#date-end-" + 2).val())
				}
				location.reload();
			});
		});
	</script>
@stop
@section('navigator')
	<div data-role="navbar">
		<ul>
			<li><a href="/track/calendar" data-icon="custom-calendar" data-iconpos="top" class="ui-nodisc-icon">Lịch kinh nguyệt</a></li>
			<li><a href="/track/statistic" data-icon="custom-statistic" data-iconpos="top" class="ui-nodisc-icon ui-btn-active ui-state-persist">Thống kê</a></li>
		</ul>
	</div>	
@stop
@section('sub-title', 'Thống kê')
@section('form')
	<div class="content">
		<div class="ui-grid-a">
			<div class="ui-block-a right">
				Chu kỳ ngắn nhất
			</div>
			<div class="ui-block-b left" id="stats-shortest-period">
			</div>
		</div>
		<div class="ui-grid-a">
			<div class="ui-block-a right">
				Chu kỳ dài nhất
			</div>
			<div class="ui-block-b left" id="stats-longest-period">
			</div>
		</div>
	</div>
	<!-- Update period -->
	<div class ="content">
		<div class="ui-grid-b">
			<div class="ui-block-a"></div>
			<div class="ui-block-b" center>
				<a href="#popup-add-2" data-rel="popup" data-transition="slideup" data-position-to="window" class="ui-btn ui-btn-icon-top ui-nodisc-icon ui-icon-custom-add" id="open-popup-add"></a>
			</div>
			<div class="ui-block-c"></div>
		</div>
		<!-- Add new period popup -->
		<div data-role="popup" id="popup-add-2">
			<form data-role="content" class="popup" id="form-2">
				<div id="check-finish-d-2" hidden>
					<label>
						<input type="checkbox" name="check-finish" id="check-finish-i-2">Kết thúc chu kỳ
					</label>					
				</div>
				<label for="date-begin" id="lb-begin-2">Ngày</label>
				<input name="date-begin" id="date-begin-2" type="date" value="<?php echo date('Y-m-d') ?>" required>
				<!--<input name="date-begin" id="date-begin" type="text" data-role="date">-->
				<div id="more-input-d-2" hidden>
					<label for="date-end" id="lb-end-2">Đến ngày</label>
					<input name="date-end" id="date-end-2" type="date" novalidate>
					<!--<input name="date-end" id="date-end" type="text" data-role="date">-->
				</div>	
				<div>
					<a href="#" id="more-input-a-2">Mở rộng</a>
				</div>
				<div class="ui-grid-a center">
					<div class="ui-block-a">
						<!--<a href="#" class="ui-btn ui-icon-check ui-btn-icon-left">Đồng ý</a>-->
						<input type="submit" class="ui-icon-check ui-btn-icon-left" value="Đồng ý">
					</div>
					<div class="ui-block-b">
						<!--<a href="#" data-rel="back" class="ui-btn ui-icon-delete ui-btn-icon-left">Hủy bỏ</a>-->
						<input type="button" class="ui-icon-delete ui-btn-icon-left" value="Hủy bỏ" id="btn-close-2">
					</div>
				</div>
			</form>
		</div>
	</div>
@stop