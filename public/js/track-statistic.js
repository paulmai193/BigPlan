$(document).on("pagecreate", function() {
	// Prepare UI
	// Statistic information
	$("#stats-total-period").html(track.ranges.length);
	if(track.shortestPeriod === 46) {
		$("#stats-shortest-period").html("Chưa thống kê");
	}
	else {
		$("#stats-shortest-period").html(track.shortestPeriod);
	}
	if(track.longestPeriod === 0) {
		$("#stats-longest-period").html("Chưa thống kê");
	} else {
		$("#stats-longest-period").html(track.longestPeriod);
	}
	if(track.longestMenstruation === 0) {
		$("#stats-longest-menstruation").html("Chưa thống kê");
	}
	else {
		$("#stats-longest-menstruation").html(track.longestMenstruation);
	}
	if(track.shortestMenstruation === 21) {
		$("#stats-shortest-menstruation").html("Chưa thống kê");
	}
	else {
		$("#stats-shortest-menstruation").html(track.shortestMenstruation);
	}
	if(track.currentPeriod !== null) {
		var current = track.ranges[track.findPreriodById(track.currentPeriod)],
		dateFormat = "DD/MMMM/YYYY";
		$("#stats-current-menstruation").html(moment(current.start).format(dateFormat) + "<br>" + moment(current.end).format(dateFormat));
	}
	else {
		$("#stats-current-menstruation").html("Chưa có");
	}
});