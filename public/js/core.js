'use strict';
// Constants
var PERIOD_RANGES = ('period-ranges'),
PERIOD_CURRENT = ('period-current');
var track = {
	TODAY : moment(new Date()).format('YYYY-MM-DD'),
	// Variables
	ranges : null,
	currentPeriod : null,
	shortestPeriod : 46,
	longestPeriod : 0,
	shortestMenstruation : 21,
	longestMenstruation : 0,
};
// Load period dates from local storage
if (typeof(Storage) !== 'undefined') {
	track.currentPeriod = localStorage.getItem(PERIOD_CURRENT);
	if(track.currentPeriod !== null) {
		track.currentPeriod = +(track.currentPeriod);
	}
	track.ranges = localStorage.getItem(PERIOD_RANGES);
	if(track.ranges === null) {
		track.ranges = []
	}
	else {
		track.ranges = JSON.parse(track.ranges);
		initData();
	}
} 
else {
	alert('Sorry! No Web Storage support..');
}
track.updatePeriod = function(start,end) {
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
		var i = track.findPreriodById(id);
		if(end === start) {
			// In case user just enter start day, that mean set it into end day
			start = track.ranges[i].start;
		}
		track.ranges[i] = {'id': id, 'start': start, 'end': end};
	}
	else {
		var i = track.findPeriodByStartDay(start);
		if(i > -1) {
			start = track.ranges[i].start;
			id = track.ranges[i].id;
		}
		// If current period not set
		if(track.TODAY >= start && track.TODAY <= end) {
			// Set this id to current
			track.currentPeriod = id;
		}
		// Choose to update or add new period to ranges
		if(i > -1) {
			track.ranges[i] = {'id': id, 'start': start, 'end': end};
		}
		else {
			track.ranges.push({'id': id, 'start': start, 'end': end});	
		}
	}
	// Statistic
	if(typeof(lastPeriod) !== 'undefined') {
		var delta = moment(start).diff(moment(lastPeriod.start), 'days');
		if(track.shortestPeriod === '' || track.shortestPeriod > delta) {
			track.shortestPeriod = delta;
		}
		if(track.longestPeriod === '' || track.longestPeriod < delta) {
			track.longestPeriod = delta;
		}
	}
	// Save to localStorage
	if (typeof(Storage) !== 'undefined') {
		localStorage.setItem(PERIOD_RANGES, JSON.stringify(track.ranges));
		if(track.currentPeriod !== null) {
			localStorage.setItem(PERIOD_CURRENT, track.currentPeriod);
		}
	}
}
track.removeCurrentPeriod = function() {
	track.currentPeriod = null;
	localStorage.removeItem(PERIOD_CURRENT);
}
track.findPreriodById = function(id){
	return track.ranges.findIndex(function(x) {
		return x.id==id;
	});
}
track.findPeriodByStartDay = function(startDay){
	return track.ranges.findIndex(function(x) {
		return x.start==startDay;
	});
}
function initData() {
	var target;
	$.each(sortData(track.ranges), function(k,v) {
		if(typeof(target) !== 'undefined') {
			// Get shortest/longest period
			var delta = moment(v.start).diff(moment(target), 'days');
			if(track.shortestPeriod > delta) {
				track.shortestPeriod = delta;
			}
			if(track.longestPeriod < delta) {
				track.longestPeriod = delta;
			}			
		}
		// Get shortest/longest menstruation
		if(v.id !== track.currentPeriod) {
			delta = moment(v.end).diff(moment(v.start), 'days') + 1;
			if(track.shortestMenstruation > delta) {
				track.shortestMenstruation = delta;
			}
			if(track.longestMenstruation < delta) {
				track.longestMenstruation = delta;
			}
		}
		// Replace target
		target = v.start;		
	});
}
function sortData(ranges) {
	var tmpRanges = ranges.slice();
	tmpRanges.sort(function(a,b) {
		if(a.start > b.start){ 
			return 1;
		}
		if(a.start < b.start){ 
			return -1;
		}
		return 0;
	});
	return tmpRanges;
}