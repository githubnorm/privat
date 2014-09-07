var ajaxSubmit = function(formEl) {
	// fetch where we want to submit the form to
	var url = $(formEl).attr('action');

	// fetch the data for the form
	var data = $(formEl).serializeArray();

	$('#divAddJob').hide();
	$('#divEditJob').hide();
	$('#divEditCompany').hide();
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
		} else {
			$("*").removeClass("busy");
			alert( "something went wrong!" );
		}
	}).fail(function() {
		$("*").removeClass("busy");
		alert( "db operation failed!" );
	});

	// return false so the form does not actually
	// submit to the page
	return false;
}

var loadData = function() {
	$("*").addClass("busy");
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
		} else {
			alert( "something went wrong!" );
		}
	}).fail(function() {
		alert( "delete failed!" );
	}).always(function() {
		$("*").removeClass("busy");
	});
	return false;
};

var showAddFormJob = function(id) {
	if(!!id) {
		$('#divAddJob').show();
		$('#formAddJob').children("[name='companyID']").val(id);
	} else {
		$('#divAddJob').hide();
	}
	return false;
};

var showEditFormJob = function(el, jid) {
	if(!!el && !!id) {
		$('#divEditJob').show();
		var form = $('#formEditJob'), parent = $(el).parent();
//		form.children("[name='companyID']").val(cid);
		form.children("[name='jobID']").val(jid);
		form.children("[name='position']").val(parent.find('a').text());
		form.children("[name='link']").val(parent.find('a').attr('href'));
		form.children("[name='notes']").val(parent.find('span').first().text());
	} else {
		$('#divEditJob').hide();
	}
	return false;
};
var showEditFormCompany = function(el, cid) {
	if(!!el && !!cid) {
		$('#divEditCompany').show();
		var form = $('#formEditCompany'), parent = $(el).parent();
		form.children("[name='companyID']").val(cid);
		form.children("[name='country']").val(parent.children(".country").text());
		form.children("[name='city']").val(parent.children(".city").text());
		form.children("[name='com_name']").val(parent.children(".company").find('a').text());
		form.children("[name='com_link']").val(parent.children(".company").find('a').attr('href'));
		form.children("[name='infos']").val(parent.children(".infos").text());
		form.children("[name='loc_address']").val(parent.children(".address").find('a').text());
		form.children("[name='loc_link']").val(parent.children(".address").find('a').attr('href'));
		form.children("[name='loc_route']").val(parent.children(".route").text());
		form.children("[name='ratings']").val(parent.children(".ratings").text());
		form.children("[name='notes']").val(parent.children(".notes").text());
	} else {
		$('#divEditCompany').hide();
	}
	return false;
};

$( document ).ready(function() {
	loadData();
});
