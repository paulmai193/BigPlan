'use strict';var PERIOD_RANGES="period-ranges",PERIOD_CURRENT="period-current";var track={TODAY:moment(new Date()).format("YYYY-MM-DD"),ranges:null,currentPeriod:null,shortestPeriod:46,longestPeriod:0,shortestMenstruation:21,longestMenstruation:0,};if(typeof(Storage)!=="undefined"){track.ranges=localStorage.getItem(PERIOD_RANGES);if(track.ranges===null){track.ranges=[]}
else{track.ranges=JSON.parse(track.ranges);sortData(track.ranges);initData();}
track.currentPeriod=localStorage.getItem(PERIOD_CURRENT);if(track.currentPeriod!==null){track.currentPeriod=+(track.currentPeriod);}}else{alert("Sorry! No Web Storage support..");}
track.updatePeriod=function(start,end){var id=1;var lastPeriod;if(track.ranges.length>0){lastPeriod=track.ranges[track.ranges.length-1];id=lastPeriod.id+1;}
if(track.currentPeriod!==null){id=track.currentPeriod;var i=findPreriodById(id);if(end===""){end=start;start=track.ranges[i].start;}
track.ranges[i]={"id":id,"start":start,"end":end};}
else{if(end===""){end=start;}
if(track.TODAY>=start&&track.TODAY<=end){track.currentPeriod=id;}
track.ranges.push({"id":id,"start":start,"end":end});}
if(typeof(lastPeriod)!=="undefined"){var delta=moment(start).diff(moment(lastPeriod.start),"days");if(track.shortestPeriod===""||track.shortestPeriod>delta){track.shortestPeriod=delta;}
if(track.longestPeriod===""||track.longestPeriod<delta){track.longestPeriod=delta;}}
if(typeof(Storage)!=="undefined"){localStorage.setItem(PERIOD_RANGES,JSON.stringify(track.ranges));if(track.currentPeriod!==null){localStorage.setItem(PERIOD_CURRENT,track.currentPeriod);}}}
track.removeCurrentPeriod=function(){track.currentPeriod=null;localStorage.removeItem(PERIOD_CURRENT);}
track.findPreriodById=function(id){return track.ranges.findIndex(x=>x.id==id);}
function initData(){var target;$.each(track.ranges,function(k,v){if(typeof(target)!=="undefined"){var delta=moment(v.start).diff(moment(target),"days");if(track.shortestPeriod>delta){track.shortestPeriod=delta;}
if(track.longestPeriod<delta){track.longestPeriod=delta;}}
delta=moment(v.end).diff(moment(v.start),"days")+1;if(track.shortestMenstruation>delta){track.shortestMenstruation=delta;}
if(track.longestMenstruation<delta){track.longestMenstruation=delta;}
target=v.start;});}
function sortData(ranges){ranges.sort(function(a,b){if(a.start>b.start){return 1;}
if(a.start<b.start){return-1;}
return 0;});}