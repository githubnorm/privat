var ajaxSubmit = function(formEl) {
	// fetch where we want to submit the form to
	var url = $(formEl).attr('action');

	// fetch the data for the form
	var data = $(formEl).serializeArray();

	$("*").addClass("busy");
	// setup the ajax request
	$.ajax({
		url: url,
		type: 'POST',
		data: data,
		dataType: 'json'
	}).done(function(rsp) {
		if(rsp.success) {
			loadData();
		}
	}).fail(function() {
		alert( "insert failed!" );
	})

	// return false so the form does not actually
	// submit to the page
	return false;
}

var loadData = function() {
	$.ajax({
		url: 'source/db_fetch.php',
		dataType: 'html',
		cache: false
	}).done(function(response) {
		$("[data-target='hot']").html(response);
		$("*").removeClass("busy");
	}).fail(function() {
		alert( "fetch failed!" );
	})
	return false;
}

var deleteRow = function(id) {
	$("*").addClass("busy");
	$.ajax({
		url: 'source/db_delete.php?company_id='+id,
		dataType: 'json'
	}).done(function(rsp) {
		if(rsp.success) {
			loadData();
		}
	}).fail(function() {
		alert( "delete failed!" );
	})
	return false;
};

$( document ).ready(function() {
	loadData();
});
