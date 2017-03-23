$(document).on("pagecreate", function() {
	fillLastPeriod(2);
	var min = track.shortestPeriod === 46 ? 30 : track.shortestPeriod > 18 ? track.shortestPeriod : 18;
	$("#period-short").val(min).slider("refresh");;
	if(min < track.longestPeriod) {
		$("#period-long").attr("min", min).val(track.longestPeriod).slider("refresh");;
	}
	else {
		$("#period-long").attr("min", min).val(min).slider("refresh");;
	}
	
	$(document).on("change", "#period-short", function(){
		var min = $("#period-short").val();
		var max = $("#period-long").val();
		if(min > max) {
			$("#period-long").attr("min", min).val(min).slider("refresh");
		}
		else {
			$("#period-long").attr("min", min).slider("refresh");
		}
	});
	$("#form-2").submit(function(e) {
		e.preventDefault();
		calculate2();				
	});
})
function calculate2() {			
	var timeStamp = moment($("#last-time-2").val(), showDateFormat).unix();
	var periodShort = $("#period-short").val();
	var periodLong = $("#period-long").val();
	var begin = moment.unix(calBegin(timeStamp, periodShort)).format(showDateFormat);
	var end = moment.unix(calEnd(timeStamp, periodLong)).format(showDateFormat);
	showResult( "Thời gian có thể thụ thai:<br>" + begin + " - " + end, 2 );
}