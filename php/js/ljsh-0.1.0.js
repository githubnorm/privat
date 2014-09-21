/* 
 * util functions
 * **********************
 */
var showLoader = function() {
	$('#hotList').hide();
	$('#loader').show();
}
var showList = function() {
	$('#hotList').show();
	$('#loader').hide();
}
var showCompanyForm = function(bText) {
	$('#jobFields').hide();
	$('#companyFields').show();
	switchButtonText(bText);
}
var showJobForm = function(bText) {
	$('#jobFields').show();
	$('#companyFields').hide();
	switchButtonText(bText);
}

var switchButtonText = function(txt) {
	$('#formSubmit').text(txt);
}

/*
 * main functions
 * ****************
 */
var loadData = function() {
	showLoader();
	$.ajax({
		url: 'src/ljshFunc.php?a=f',
		dataType: 'html',
		cache: false
	}).done(function(response) {
		$("#hotList").html(response);
	}).fail(function() {
		alert( "fetch failed!" );
	}).always(function() {
		showList();
	});
	return false;
}

var ajaxSubmit = function(formEl) {
	showLoader();
	
	var url = $(formEl).attr('action'); // fetch where we want to submit the form to
	var data = $(formEl).serializeArray(); // fetch the data for the form

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
			alert( "something went wrong!" );
			showList();
		}
	}).fail(function() {
		alert( "db operation failed!" );
		showList();
	});

	// return false so the form does not actually
	// submit to the page
	return false;
}

var resetForm = function() {
	form = $('#theForm');
	form.find("[name='formAction']").val('cAdd');
	form.find("[name^='c']").val('');
	form.find("[name^='j']").val('');
	showCompanyForm('Add Company'); 
	return false;
};

var deleteData = function(cid, jid) {
	showLoader();
	var delete_url = 'src/ljshFunc.php?a=d';
	if(jid==0) {
		delete_url = delete_url+'&company_id='+cid+'&all=true'; // TODO: cid, jid
	} else if(!!jid) {
		delete_url = delete_url+'&company_id='+cid+'&job_id='+jid;
	} else {
		delete_url = delete_url+'&company_id='+cid;
	}
	$.ajax({
		url: delete_url,
		dataType: 'json'
	}).done(function(rsp) {
		if(rsp.success) {
			loadData();
		} else {
			alert( "something went wrong!" );
			showList();
		}
	}).fail(function() {
		alert( "delete failed!" );
		showList();
	})
	return false;
};

var addJData = function(cid) {
	if(!!cid) {
		resetForm();
		form.find("[name='formAction']").val('jAdd');
		form.find("[name='companyID']").val(cid);
		showJobForm('Add Job');
	}
	return false;
};

var editJData = function(jid, el) {
	if(!!jid && !!el) {
		resetForm();
		var form = $('#theForm'), parentEL = $(el).closest(".jobRow");
		form.find("[name='formAction']").val('jEdit');
		form.find("[name='jobID']").val(jid);
		form.find("[name='jposition']").val(parentEL.find('.cellPosition').text());
		form.find("[name='jlink']").val(parentEL.find('a').attr('href'));
		form.find("[name='jnotes']").val(parentEL.find('.cellJobNotes').text());
		showJobForm('Edit Job');
	}
	return false;
};

var editCData = function(cid, el) {
	if(!!cid && !!el) {
		var form = $('#theForm'), parentEL = $(el).closest(".listLayer");
		showCompanyForm('Edit Company');
		form.find("[name='formAction']").val('cEdit');
		form.find("[name='companyID']").val(cid);
		form.find("[name='country']").val(parentEL.find(".cellCounty").text());
		form.find("[name='city']").val(parentEL.find(".cellCity").text());
		form.find("[name='cname']").val(parentEL.find(".cellCompany").text());
		form.find("[name='clink']").val(parentEL.find(".cellCompanyLink").attr('href'));
		form.find("[name='cinfos']").val(parentEL.find(".cellInfos").text());
		form.find("[name='caddress']").val(parentEL.find(".cellAddress").text());
		form.find("[name='caddress_link']").val(parentEL.find(".cellAddressLink").attr('href'));
		form.find("[name='croute']").val(parentEL.find(".cellRoute").text());
		form.find("[name='cratings']").val(parentEL.find(".cellRatings").text());
		form.find("[name='cnotes']").val(parentEL.find(".cellNotes").text());
	}
	return false;
};

/*
 * onload functions
 * ****************
 */
$( document ).ready(function() {
	resetForm();
	loadData();
});
