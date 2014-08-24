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
		$("*").removeClass("busy");
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
	}).fail(function() {
		alert( "fetch failed!" );
	}).always(function() {
		$("*").removeClass("busy");
	});
	return false;
}

var deleteData = function(cid, jid) {
	$("*").addClass("busy");
	var delete_url = 'source/db_delete.php';
	if(jid==0) {
		delete_url = delete_url+'?company_id='+cid+'&all=true';
	} else if(!!jid) {
		delete_url = delete_url+'?company_id='+cid+'&job_id='+jid;
	} else {
		delete_url = delete_url+'?company_id='+cid;
	}
	$.ajax({
		url: delete_url,
		dataType: 'json'
	}).done(function(rsp) {
		if(rsp.success) {
			loadData();
		}
	}).fail(function() {
		alert( "delete failed!" );
		$("*").removeClass("busy");
	})
	return false;
};

var showAddForm = function(id) {
	if(id) {
		$('#company').val(id);
		$('#div_add').show();
	} else {
		$('#div_add').hide();
	}
	return false;
};

$( document ).ready(function() {
	loadData();
});
