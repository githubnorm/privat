/* 
 * private util functions
 * **********************
 */
var showLoader = function() {
	$('#list').hide();
	$('#loader').show();
}
var showList = function() {
	$('#list').show();
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
 * public functions
 * ****************
 */

var loadData = function() {
	showLoader();
	$.ajax({
		url: 'src/ljshFunc.php?a=f',
		dataType: 'html',
		cache: false
	}).done(function(response) {
		$("[data-target='hot']").html(response);
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

var addJData = function(cid, el) {
	if(!!cid && !!el) {
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
		var form = $('#theForm'), parentEL = $(el).parent();
		form.find("[name='formAction']").val('jEdit');
		form.find("[name='jobID']").val(jid);
		form.find("[name='jposition']").val(parentEL.find('a').text());
		form.find("[name='jlink']").val(parentEL.find('a').attr('href'));
		form.find("[name='jnotes']").val(parentEL.find('span').first().text());
		showJobForm('Edit Job');
	}
	return false;
};

var editCData = function(cid, el) {
	if(!!cid && !!el) {
		var form = $('#theForm'), parentEL = $(el).parent();
		showCompanyForm('Edit Company');
		form.find("[name='formAction']").val('cEdit');
		form.find("[name='companyID']").val(cid);
		form.find("[name='country']").val(parentEL.children(".country").text());
		form.find("[name='city']").val(parentEL.children(".city").text());
		form.find("[name='cname']").val(parentEL.children(".company").find('a').text());
		form.find("[name='clink']").val(parentEL.children(".company").find('a').attr('href'));
		form.find("[name='cinfos']").val(parentEL.children(".infos").text());
		form.find("[name='caddress']").val(parentEL.children(".address").find('a').text());
		form.find("[name='caddress_link']").val(parentEL.children(".address").find('a').attr('href'));
		form.find("[name='croute']").val(parentEL.children(".route").text());
		form.find("[name='cratings']").val(parentEL.children(".ratings").text());
		form.find("[name='cnotes']").val(parentEL.children(".notes").text());
	}
	return false;
};

/*
 * onload functions
 * ****************
 */

//$( document ).ready(function() {
//	resetForm();
//	loadData();
//});
