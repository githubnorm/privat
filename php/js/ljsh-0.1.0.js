/* 
 * util functions
 * **************
 */

/* loading */
var resetWarningsAndErrors = function() {
	$('#inputWarnings').text(''); $('#inputErrors').text('');
	return false;
}
var hideLists = function() {
	$("[data-target]").hide();
	return false;
}
var showLoader = function() {
	hideLists();
	$('#loader').show();
}
var showList = function(list) {
	$('#loader').hide();
	$("[data-target='"+list+"']").show();
}
/* form switching */
var showSearchField = function(bText) {
	$('#jobFields').hide();
	$('#companyFields').hide();
	$('#formButtons').hide();
	$('#startButton').show();
	$('#searchField').show();
	$("#urlInput").val('');
	$("#urlInput").attr('autocomplete', 'off');
	switchStatusButtonText(bText)
}
var showCompanyForm = function(bText) {
	$('#jobFields').hide();
	$('#startButton').hide();
	$('#searchField').hide();
	$('#formButtons').show();
	$('#companyFields').show();
	switchFormButtonText(bText);
}
var showJobForm = function(bText) {
	$('#companyFields').hide();
	$('#startButton').hide();
	$('#searchField').hide();
	$('#formButtons').show();
	$('#jobFields').show();
	switchFormButtonText(bText);
}
var switchFormButtonText = function(txt) {
	$('#formSubmit').text(txt);
}
var switchStatusButtonText = function(txt, status, warning) {
	var el = $('#inputStatus'), warn = $('#inputWarnings');
	if(!status) {
		el.removeClass().addClass("pure-button-disabled pure-button");
	}
	if(!warning) {
		warn.text(' ');
	}
	if(!!status && status == 'active') {
		el.removeClass().addClass("pure-button button-success");
	}
	if(!!warning && warning!='' ) {
		warn.text(warning);
	}
	el.text(txt);
}

var getList = function() {
	return $('#theForm').find("[name='ltype']").val();
}
var getListType = function(x) {
	var s = x.split(';')[1]; 
	if( s == 'hl' ) return 'HOT LIST';
	if( s == 'il' ) return 'INTERESTING LIST';
	if( s == 'bl' ) return 'BLACK LIST';
	return false;
}

var getComparableString = function(s) {
	if( s.indexOf('//') != -1 && s.split('//')[1] != "") {
		s = s.split('//')[1].split('/')[0];
		if( s.indexOf('.') != -1 ) {
			s = s.split('.');
			if( s[s.length-1].length > 1 ) {
				return s[s.length-2] + '.' + s[s.length-1];
			}
		}
	} else {
		s = s.split('/')[0];
		if( s.indexOf('.') != -1 ) {
			s = s.split('.');
			if( s[s.length-1].length > 1 ) {
				return s[s.length-2] + '.' + s[s.length-1];
			}
		}
	}
	return false;
}
var compareStrings = function(s1,s2) {
	var c1 = getComparableString(s1);
	var c2 = getComparableString(s2);
	if(c1==c2) {
		return 1;
	}
	if( (!!c1 && !!c2) 
			&& ( c1.split('.')[1] != c2.split('.')[1] ) 
			&& ( c1.split('.')[0] == c2.split('.')[0] ) 
		) {
		return 0;
	}
	return -1;
}


/*
 * main functions
 * **************
 */

/* *** INITS *** */
var initCheckField = function() {
	resetWarningsAndErrors();
	$("#urlInput").keyup(function() {
		if(this.value.length==0) {
			switchStatusButtonText( msg['button_text_waiting'] ); return false;
		}
		if(this.value.length>3) {
			if( !!getComparableString(this.value) ) {
				var hostExist = false, nameExist = false, tmpURL, tmpList;
				for (i in companyList) {
					var splitResult = companyList[i].split(';');
					if( compareStrings(this.value,splitResult[0]) == 1 ) {
						switchStatusButtonText( getComparableString(splitResult[0])+' '+msg['warning_msg_exist']+' '+splitResult[1]+'!' );
						return false;
					}
					if(compareStrings(this.value,splitResult[0]) == 0 ) {
						nameExist = true;
						tmpURL  = getComparableString(splitResult[0]);
						tmpList = splitResult[1];
					}
				};
				switchStatusButtonText( msg['button_text_enter_company'] ,'active');
				if(nameExist) {
					switchStatusButtonText( msg['button_text_enter_company'] ,'active', tmpURL+" "+msg['warning_msg_similar_exist']+" "+tmpList+"!");
				}
				return false;
			}
		}
		switchStatusButtonText( msg['button_text_invalid'] );
		return false;
	});
	$('#inputStatus').click(function(){
		if( ! $(this).hasClass('pure-button-disabled') ) {
			showCompanyForm( msg['button_text_add_company'] );
			$("#clink").val( $("#urlInput").val() );
		}
		return false;
	});
	return false;
}

var initListTabs = function() {
	resetWarningsAndErrors();
	$("[data-list]").click(function(){
		loadList($(this).attr('data-list'));
	});
	return false;
}

var resetForm = function() {
	resetWarningsAndErrors();
	var form = $('#theForm');
	form.find("[name='formAction']").val('cAdd');
	form.find("[name^='c']").val('');
	form.find("[name^='j']").val('');
	showSearchField( msg['button_text_waiting'] );
	return false;
};
/* *** INITS *** */

/* *** AJAXS *** */
var loadList = function(list) {
	resetWarningsAndErrors();
	if(!!list) {
		showLoader();
		$('#theForm').find("[name='ltype']").val(list);
		$.ajax({
			url: 'src/ljshFunc.php?a=f&l='+list,
			dataType: 'html',
			cache: false
		}).done(function(data, textStatus, jqXHR) {
			if(data!="") {
				$("[data-target='"+list+"']").html( data.substring(0,data.indexOf('<script')) );
				$('#allLinks').replaceWith( data.substring(data.indexOf('<script'), data.indexOf('</script>')+'</script>'.length) );
			} else {
				$("[data-target='"+list+"']").html("<div style=\"padding: 40px 0; text-align:center\">"+msg['error_msg_fetch_failed']+"</div>");
			}
		}).fail(function() {
			$("[data-target='"+list+"']").html("<div style=\"padding: 40px 0; text-align:center\">"+msg['error_msg_fetch_failed']+"</div>");
		}).always(function() {
			showList(list);
		});
	} else {
		$("[data-target='"+list+"']").html("<div style=\"padding: 40px 0; text-align:center\">"+msg['error_msg_fetch_failed']+"</div>");
	}
	return false;
}

var ajaxSubmit = function(formEl) {
	resetWarningsAndErrors();
	if(!!formEl) {
		showLoader();
		var form = $(formEl);
		var url  = form.attr('action'); // fetch where we want to submit the form to
		var data = form.serializeArray(); // fetch the data for the form
		var list = form.find("[name='ltype']").val();
		
		// setup the ajax request
		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			dataType: 'json'
		}).done(function(data, textStatus, jqXHR) {
			if(data.success) {
				loadList(list);
			} else {
				$('#inputErrors').text( msg['error_msg_submit_failed'] );
				showList(list);
			}
		}).fail(function() {
			$('#inputErrors').text( msg['error_msg_submit_failed'] );
			showList(list);
		});
	} else {
		$('#inputErrors').text( msg['error_msg_submit_failed'] );
	}
	// return false so the form does not actually submit to the page
	return false;
}

var deleteData = function(cid, jid) {
	resetWarningsAndErrors();
	if(!!cid) {
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
		}).done(function(data, textStatus, jqXHR) {
			if(data.success) {
				loadList(getList());
			} else {
				$("[data-target='"+getList()+"']").html("<div style=\"padding: 40px 0; text-align:center\">"+msg['error_msg_delete_failed']+"</div>");
				showList(getList());
			}
		}).fail(function() {
			$("[data-target='"+getList()+"']").html("<div style=\"padding: 40px 0; text-align:center\">"+msg['error_msg_delete_failed']+"</div>");
			showList(getList());
		})
	} else {
		$("[data-target='"+getList()+"']").html("<div style=\"padding: 40px 0; text-align:center\">"+msg['error_msg_delete_failed']+"</div>");
	}
	return false;
};

var moveData = function(cid, lid) {
	resetWarningsAndErrors();
	if(!!cid && !!lid) {
		showLoader();
		var move_url = 'src/ljshFunc.php?a=m&cid='+cid+'&lid='+lid;
		$.ajax({
			url: move_url,
			dataType: 'json'
		}).done(function(data, textStatus, jqXHR) {
			if(data.success) {
				loadList(getList());
			} else {
				$("[data-target='"+getList()+"']").html("<div style=\"padding: 40px 0; text-align:center\">"+msg['error_msg_move_failed']+"</div>");
				showList(getList());
			}
		}).fail(function() {
			$("[data-target='"+getList()+"']").html("<div style=\"padding: 40px 0; text-align:center\">"+msg['error_msg_move_failed']+"</div>");
			showList(getList());
		})
	} else {
		$("[data-target='"+getList()+"']").html("<div style=\"padding: 40px 0; text-align:center\">"+msg['error_msg_move_failed']+"</div>");
	}
	return false;
};
/* *** AJAXS *** */

/* *** FORM UI *** */
var addJData = function(cid) {
	resetWarningsAndErrors();
	if(!!cid) {
		resetForm();
		var form = $('#theForm');
		form.find("[name='formAction']").val('jAdd');
		form.find("[name='companyID']").val(cid);
		showJobForm( msg['button_text_add_job'] );
	}
	return false;
};

var editJData = function(jid, el) {
	resetWarningsAndErrors();
	if(!!jid && !!el) {
		resetForm();
		var form = $('#theForm'), parentEL = $(el).closest(".jobRow");
		form.find("[name='formAction']").val('jEdit');
		form.find("[name='jobID']").val(jid);
		form.find("[name='jposition']").val(parentEL.find('.cellPosition').text());
		form.find("[name='jlink']").val(parentEL.find('a').attr('href'));
		form.find("[name='jnotes']").val(parentEL.find('.cellJobNotes').text());
		showJobForm( msg['button_text_edit_job'] );
	}
	return false;
};

var editCData = function(cid, el) {
	resetWarningsAndErrors();
	if(!!cid && !!el) {
		var form = $('#theForm'), parentEL = $(el).closest(".listLayer");
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
		showCompanyForm( msg['button_text_edit_company'] );
	}
	return false;
};
/* *** FORM UI *** */

/*
 * onload function
 * ***************
 */
$( document ).ready(function() {
	resetForm();
	loadList(['1']);
	initListTabs();
	initCheckField();
});
