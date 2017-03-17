$(document).on("pagecreate", function() {
	var showDateFormat = "DD/MMM/YYYY", saveDateFormat = "YYYY-MM-DD", defaultDatepickerFormat = "DD/MM/YYYY";
	// Period calendar
	var mainOptions = {
		numberOfMonths: 1,
		changeMonth: false,
		regional: "{{ config('app.locale') }}",
		beforeShow:function(input) {
			$(input).css({
				"position": "relative",
				"z-index": 999999
			});
		}
	};
	var periodCalendarOptions = mainOptions;
	periodCalendarOptions["beforeShowDay"] = function(date) {
		var date = moment(date, defaultDatepickerFormat).format(saveDateFormat);
		for(var i=0; i<track.ranges.length; i++) {
			if(date >= track.ranges[i].start && date <= track.ranges[i].end) {
				//if(track.TODAY >= track.ranges[i].start && track.TODAY <= track.ranges[i].end) {
				if(typeof(current) !== "undefined" && current.id === track.ranges[i].id) {
					return [true, "ui-state-current", "Ngày hành kinh"];
				}
				else {
					return [true, "ui-state-highlight", "Ngày hành kinh"];
				}
			}
		}
		return [true, ""];
	};
	var pickupBeginOptions = periodCalendarOptions;
	pickupBeginOptions["onSelect"] = function(value) {
		$("#date-end").datepicker("option", "minDate", value).val(moment(value, defaultDatepickerFormat).format(showDateFormat));
		$(this).val(moment(value, defaultDatepickerFormat).format(showDateFormat));
	}
	$("#date-begin").datepicker(pickupBeginOptions)
	.on("input change", function(e) {
		$("#date-end").datepicker("option", "minDate", value).val(moment(value, defaultDatepickerFormat).format(showDateFormat));
	})
	.val(moment().format(showDateFormat));
	
	var pickupEndOptions = periodCalendarOptions;
	$("#date-end").datepicker(pickupEndOptions).val(moment().format(showDateFormat));
	
	var current;
	// Modify add new period popup
	if(track.currentPeriod !== null) {
		current = track.ranges[track.findPreriodById(track.currentPeriod)];
		// Show close current period option
		$("#check-finish-d").removeAttr("hidden");
	}
	// Action of tapping to more-input-a button
	$("#more-input-a").on("tap", function() {
		$("#lb-begin").empty();
		$("#lb-begin").append("Từ ngày");
		$("#date-end").val($("#date-begin").val());
		$("#more-input-d").removeAttr("hidden");
		$("#date-end").removeAttr("novalidate");
		$("#date-end").prop("required",true);
		$("#more-input-a").prop("hidden",true);
	});
	// Action of checked check-finish checkbox
	$("#check-finish-i").click(function() {
		$("#more-input-a").toggle(!this.checked);
		$("#lb-begin").toggle(!this.checked);
		$("#date-begin").toggle(!this.checked);
		$("#lb-end").toggle(!this.checked);
		$("#date-end").toggle(!this.checked);
	});
	// Action of submit update period form event
	$("#form").submit(function( event ) {
		event.preventDefault();
		if($("#check-finish-i-" + 1).is(":checked") && track.currentPeriod !== null) {
			track.removeCurrentPeriod();
		}
		else {
			track.updatePeriod(moment($("#date-begin").val(), showDateFormat).format(saveDateFormat), $("#date-end").val() !== "" ? moment($("#date-end").val(), showDateFormat).format(saveDateFormat) : "");
		}
		location.reload();
	});
	
	
	// Prepare UI
	$("#period-calendar").datepicker(periodCalendarOptions).val(moment().format(showDateFormat));
	
})