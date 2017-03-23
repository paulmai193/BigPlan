var showDateFormat = "DD/MMM/YYYY", saveDateFormat = "YYYY-MM-DD", defaultDatepickerFormat = "DD/MM/YYYY";
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
	var datepickerOptions = {
		numberOfMonths: 1,
		changeMonth: 0,				
		regional: "{{ config('app.locale') }}",
		onSelect: function(value) {
			$(this).val(moment(value, defaultDatepickerFormat).format(showDateFormat));
		}
	};
	if(track.ranges.length > 0) {
		$("#last-time-" + n).datepicker(datepickerOptions).val(moment(track.ranges[track.ranges.length - 1].start, saveDateFormat).format(showDateFormat))
	}
	else {
		$("#last-time-" + n).datepicker(datepickerOptions).val(moment().format(showDateFormat));
	}
}