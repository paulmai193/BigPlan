'use strict';
// Constants
var PERIOD_RANGES = "period-ranges",
PERIOD_CURRENT = "period-current";

	
var track = {
	TODAY : moment(new Date()).format("YYYY-MM-DD"),
	// Variables
	ranges : null,
	currentPeriod : null,
	shortestPeriod : 46,
	longestPeriod : 0,
	shortestMenstruation : 21,
	longestMenstruation : 0,
};
// Load period dates from local storage
if (typeof(Storage) !== "undefined") {
	track.ranges = localStorage.getItem(PERIOD_RANGES);
	if(track.ranges === null) {
		track.ranges = []
	}
	else {
		track.ranges = JSON.parse(track.ranges);
		sortData(track.ranges);
		initData();
	}
	track.currentPeriod = localStorage.getItem(PERIOD_CURRENT);
	if(track.currentPeriod !== null) {
		track.currentPeriod = +(track.currentPeriod);
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
	if(track.currentPeriod !== null) {
		// If current period is set, update this period start / end time
		id = track.currentPeriod;
		var i = findPreriodById(id);
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
		localStorage.setItem(PERIOD_RANGES, JSON.stringify(track.ranges));
		if(track.currentPeriod !== null) {
			localStorage.setItem(PERIOD_CURRENT, track.currentPeriod);
		}
	}
}
function removeCurrentPeriod() {
	track.currentPeriod = null;
	localStorage.removeItem(PERIOD_CURRENT);
}
function findPreriodById(id){
	return track.ranges.findIndex(x => x.id==id);
}
function initData() {
	var target;
	$.each(track.ranges, function(k,v) {
		if(typeof(target) !== "undefined") {
			// Get shortest/longest period
			var delta = moment(v.start).diff(moment(target), "days");
			if(track.shortestPeriod > delta) {
				track.shortestPeriod = delta;
			}
			if(track.longestPeriod < delta) {
				track.longestPeriod = delta;
			}			
		}
		// Get shortest/longest menstruation
		delta = moment(v.end).diff(moment(v.start), "days") + 1;
		if(track.shortestMenstruation > delta) {
			track.shortestMenstruation = delta;
		}
		if(track.longestMenstruation < delta) {
			track.longestMenstruation = delta;
		}
		// Replace target
		target = v.start;		
	});
}
function sortData(ranges) {
	ranges.sort(function(a,b) {
		if(a.start > b.start){ 
			return 1;
		}
		if(a.start < b.start){ 
			return -1;
		}
		return 0;
	});
}