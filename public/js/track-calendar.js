$(document).on("pagecreate", function() {
	var a;
	null !== track.currentPeriod && (a = track.ranges[track.findPreriodById(track.currentPeriod)]);
	var b = {
			numberOfMonths: 1,
			changeMonth: 0,
			regional: "{{ config('app.locale') }}",
		},
		c = b;
	c.beforeShowDay = function(b) {
		for (var b = moment(b).format("YYYY-MM-DD"), c = 0; c < track.ranges.length; c++)
			if (b >= track.ranges[c].start && b <= track.ranges[c].end) return "undefined" != typeof a && a.id === track.ranges[c].id ? [!0, "ui-state-current", "Ngày hành kinh"] : [!0, "ui-state-highlight", "Ngày hành kinh"];
		return [!0, ""]
	};
	$("#period-calendar").datepicker(c).val(new Date())
});