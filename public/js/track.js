'use strict';
var track = {
	// Constants
	PERIOD_RANGES : "period-ranges",
	PERIOD_CURRENT : "period-current",
	PERIOD_SHORTEST : "period-shortest",
	PERIOD_LONGEST : "period-longest",
	TODAY : moment(new Date()).format("YYYY-MM-DD"),
	// Variables
	ranges : null,
	currentPeriod : null,
	shortestPeriod : null,
	longestPeriod : null,
};
// Load period dates from local storage
if (typeof(Storage) !== "undefined") {
	track.ranges = localStorage.getItem(track.PERIOD_RANGES);
	if(track.ranges === null) {
		track.ranges = []
	}
	else {
		track.ranges = JSON.parse(track.ranges);
	}
	track.currentPeriod = localStorage.getItem(track.PERIOD_CURRENT);
	if(track.currentPeriod === null) {
		track.currentPeriod = "";
	}
	track.shortestPeriod = localStorage.getItem(track.PERIOD_SHORTEST);
	if(track.shortestPeriod === null) {
		track.shortestPeriod = "";
	}
	track.longestPeriod = localStorage.getItem(track.PERIOD_LONGEST);
	if(track.longestPeriod === null) {
		track.longestPeriod = "";
	}
} else {
	alert("Sorry! No Web Storage support..");
}
function updatePeriod(start,end) {
	// Set ranges
	var id = 1;
	var lastPeriod;
	if(track.ranges.length > 0) {
		lastPeriod = track.ranges[track.ranges.length - 1];
		id = lastPeriod.id + 1;
	}
	if(track.currentPeriod !== "") {
		// If current period is set, update this period start / end time
		id = track.currentPeriod;
		var i = findPreriodById(track.ranges, id);
		if(end === "") {
			// In case user just enter start day, that mean set it into end day
			end = start;
			start = track.ranges[i].start;
		}
		track.ranges[i] = {"id": id, "start": start, "end": end};
	}
	else {
		if(end === "") {
			// In case user just enter start day, that mean start = end day
			end = start;
		}
		// If current period not set
		if(track.TODAY >= start && track.TODAY <= end) {
			// Set this id to current
			track.currentPeriod = id;
		}
		track.ranges.push({"id": id, "start": start, "end": end});
	}
	// Statistic
	if(typeof(lastPeriod) !== "undefined") {
		var delta = moment(start).diff(moment(lastPeriod.start), "days");
		if(track.shortestPeriod === "" || track.shortestPeriod > delta) {
			track.shortestPeriod = delta;
		}
		if(track.longestPeriod === "" || track.longestPeriod < delta) {
			track.longestPeriod = delta;
		}
	}
	// Save to localStorage
	if (typeof(Storage) !== "undefined") {
		localStorage.setItem(track.PERIOD_RANGES, JSON.stringify(track.ranges));
		localStorage.setItem(track.PERIOD_CURRENT, track.currentPeriod);
		localStorage.setItem(track.PERIOD_SHORTEST, track.shortestPeriod);
		localStorage.setItem(track.PERIOD_LONGEST, track.longestPeriod);
	}
}
function removeCurrentPeriod() {
	localStorage.removeItem(track.PERIOD_CURRENT);
}
function findPreriodById(ranges, id){
	return ranges.findIndex(x => x.id==id);
}