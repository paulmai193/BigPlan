@extends('track.track')

@section('navigator')
	<div data-role="navbar">
		<ul>
			<li><a href="/track/calendar" class="ui-btn-active ui-state-persist">Lịch kinh nguyệt</a></li>
			<li><a href="#">Thống kê</a></li>
		</ul>
	</div>	
@stop

@section('sub-title', 'Lịch kinh nguyệt')

@section('form')
	<div class="content center">
		<form data-role="content" class="popup">
			<div id="check-finish-d" hidden>
				<label>
					<input type="checkbox" name="check-finish" id="check-finish-i">Kết thúc chu kỳ
				</label>					
			</div>
			<label for="date-begin" id="lb-begin">Ngày</label>
			<!--<input name="date-begin" id="date-begin" type="date" required>-->
			<input name="date-begin" id="date-begin" type="text" data-role="date">
			<div id="more-input-d" hidden>
				<label for="date-end" id="lb-end">Đến ngày</label>
				<!--<input name="date-end" id="date-end" type="date" novalidate>-->
				<input name="date-end" id="date-end" type="text" data-role="date">
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
@stop