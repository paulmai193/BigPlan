$(document).on("pagecreate", function() {
	fillLastPeriod(1);
	$("#period").val(track.shortestPeriod === 46 ? 30 : track.shortestPeriod > 18 ? track.shortestPeriod : 18).slider("refresh");;
	$("#form-1").submit(function(event) {
		event.preventDefault();
		calculate1();				
	});
})
function calculate1() {
	var timeStamp = moment($("#last-time-1").val(), showDateFormat).unix();
	var period = $("#period").val();
	var begin = moment.unix(calBegin(timeStamp, period)).format(showDateFormat);
	var end = moment.unix(calEnd(timeStamp, period)).format(showDateFormat);
	showResult( "Thời gian có thể thụ thai:<br>" + begin + " - " + end, 1 );
}