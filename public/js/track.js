var showDateFormat = "DD/MMM/YYYY";
function showCheckFinishPeriod(n) {
	// Show close current period option
	$("#check-finish-d-" + n).removeAttr("hidden");
}
function updateCondition(n) {
	$("#date-end-" + n).attr("min", $("#date-begin-" + n).val());
}
function showMoreOptions(n) {
	$("#lb-begin-" + n).empty();
	$("#lb-begin-" + n).append("Từ ngày");
	$("#date-end-" + n).val($("#date-begin-" + n).val());
	$("#more-input-d-" + n).removeAttr("hidden");
	$("#date-end-" + n).removeAttr("novalidate");
	$("#date-end-" + n).prop('required',true);
	$("#more-input-a-" + n).prop('hidden',true);
}
function closePopup(n) {
	$("#popup-add-" + n).popup("close");
}
function hidePopupInput(el,n) {
	$("#more-input-a-" + n).toggle(!el.checked);
	$("#lb-begin-" + n).toggle(!el.checked);
	$("#date-begin-" + n).toggle(!el.checked);
	$("#lb-end-" + n).toggle(!el.checked);
	$("#date-end-" + n).toggle(!el.checked);
}