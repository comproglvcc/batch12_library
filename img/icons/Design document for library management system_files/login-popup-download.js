var error = "";
var fromSearch = false;
var isValidEmail = true;
var isCheckingEmail = false;

function PopUnder() {
	var that = this;
	that.popUnder = null;
	var popupWindow = null;

	function pop(settings) {
		var settings = settings || {};
		settings.style       = settings.style       || "body { font-size:12px; } ";
		settings.body        = settings.body        || "<h1>missing settings.body</h1>";
		settings.windowprops = settings.windowprops || "width=10,height=10,location=no,toolbar=no,menubar=no,scrollbars=no,resizable=no";
		settings.name        = settings.name        || "DOCSTOC";

		var wasPopped = getCookie("popUnder" + settings.name);

		if(!wasPopped) {
			setCookie("popUnder" + settings.name, true, 999);
			if(popupWindow === null) {
				popupWindow = window.open("", settings.name, settings.windowprops); 
				popupWindow.window.blur();
				self.window.focus();

				var pd = popupWindow.document;
				if(pd.body.innerHTML.length < 1) {
					pd.write('<style>' + settings.style + '</style>');
					pd.write(settings.body);
				}
			} 
		}
		that.popUnder = popupWindow;
	}
	that.init = function(settings) {
		pop(settings);
	}
}


function openLoginDownload(){
    $j('#login_popup_download').css("display","block");
	if (window["disableblackbg"] != true) {
	    DisableScreen('blackbg', '#000000', '.7');
        $j("#blackbg").css("display", "block");
	}
	if (typeof (dsmetrics) != 'undefined') {
	    dsmetrics.track(new DSMActivity("open-login-download", "", dsmetrics.ActivityObjType.LoginPopup, 0, dsmetrics.ActivityActionType.View, [new DSMOtherInfo("pageName", pageName)]));
	}
}

function openRegisterQuestions() {
    var currentType = $j('input#user_action').val();
    logOverlay(currentType, 1, '#stat_url_questions');
    $j('#login_popup_question').css("display","block");
    if (window["disableblackbg"] != true) {
        DisableScreen('blackbg', '#000000', '.7');
        $j("#blackbg").css("display", "block");
    }
}

function closeRegisterQuestions() {
    $j('#login_popup_question').css("display","none");
    $j("#blackbg").css("display", "none");
}

function openUploadToDownload() {
    $j('span#user_action').text('downloading');
    $j('input#user_action').val('Download');
    $j('span#overlay_action').text('download');
    $j('#login_popup_upload_to_download .module-overlay-blue').show().parent().show();
    if (window["disableblackbg"] != true) {
        DisableScreen('blackbg', '#000000', '.7');
        $j("#blackbg").css("display", "block");
    }
    $j(".swfupload").width(195).height(36);
}

function closeUploadToDownload() {
    $j('#login_popup_upload_to_download .module-overlay-blue').hide();
    $j(".swfupload").width(1).height(1);
    $j("#blackbg").css("display", "none");
}

function openRegisterQuestions2() {

    var currentType = $j('input#user_action').val();
    $j("#login_popup_question2").css("display", "block");
    
    if (window["disableblackbg"] != true) {
        DisableScreen('blackbg', '#000000', '.7');
        $j("#blackbg").css("display", "block");
    }
}

function closeRegisterQuestions2() {
    $j("#login_popup_question2").css("display", "none");
    $j("#blackbg").css("display", "none");
}

function closeLoginDownload() {
    $j("#login_popup_download").css("display", "none");
    $j("#blackbg").css("display", "none");
    $j('input#overload_premium').val(0);
}

function showForgotPassword() {
	$j('#login_form').hide();
	$j('#password_form').show();
	$j('#login_button').hide();
	$j('#reminder_button').show();
}

function hideForgotPassword() {
	$j('#login_form').show();
	$j('#password_form').hide();
	$j('#login_button').show();
	$j('#reminder_button').hide();
}

function logOverlay(type, campaignClass, urlHid) {

    if (urlHid == null) {
        urlHid = '#stat_url';
    }
    try
    {
        $j.ajax({
        url: $j(urlHid).val() + "&sourceType=" + type + "&campaignClass=" + campaignClass,
        type: 'GET'
        });
    }
    catch (e) {
        //do nothing
    }
}

function openRegisterPrint() {
	$j(function() {
		logOverlay("Print", 1);
		logPhonePopup(DocumentID);
		$j('span#user_action').text('printing');
		$j('input#user_action').val('Print');
		$j('span#overlay_action').text('print');
		$j('#login_popup_download_register').css("display", "block");
		if (window["disableblackbg"] != true) {
			DisableScreen('blackbg', '#000000', '.7');
			$j("#blackbg").css("display", "block");
		}
		if (typeof (dsmetrics) != 'undefined') {
			dsmetrics.track(new DSMActivity("open-register-print", "", dsmetrics.ActivityObjType.RegisterPopup, 0, dsmetrics.ActivityActionType.View, [new DSMOtherInfo("pageName", pageName)]));
		}
	});
}

//Default openRegisterDownload(
function openRegisterDownload() {
	$j(function() {
		if (window["disableblackbg"] != true) {
			DisableScreen('blackbg', '#000000', '.7');
			$j('#blackbg').css('display', 'block');
		}

		typeof addFuncToRegisterDownload === "function" && addFuncToRegisterDownload();

		if (window.frames && window.frames.loginIframeName) {
			try {

				window.frames.loginIframeName.openRegisterDownload();
				$j(window).resize(function() {
					$j("#loginIframeId").css('height', $j(window).height());
				});
				$j("#loginIframeId").show().css('height', $j(window).height());
				return;
			} catch (e) {
			}
		}
		if ($j('#login_popup_download_register').length > 0) {
			logOverlay("Download", 1);
			logPhonePopup(DocumentID);
			$j('span#user_action').text('downloading');
			$j('input#user_action').val('Download');
			$j('span#overlay_action').text('download');

			$j('#login_popup_download_register').css('display', 'block');


			if (typeof (dsmetrics) != 'undefined') {
				dsmetrics.track(new DSMActivity("open-register-download", "", dsmetrics.ActivityObjType.RegisterPopup, 0, dsmetrics.ActivityActionType.View, [new DSMOtherInfo("pageName", pageName)]));
			}
		}
		else {
			setTimeout(openRegisterDownload, 100);
		}
	});
   }

   function isNumber(str) {
   	return /^[0-9]+$/.test(str);
   }

   function openRegisterDownloadPremium() {
   	$j('input#overload_premium').val(1);
   	openRegisterDownload();
   }

function closeRegisterDownload() {
    try {
        if (top != window && top.closeRegisterDownload) {
            top.closeRegisterDownload();
            return;
        }
    } catch (e) {
   }
	$j('input#overload_premium').val(0);
    $j("#loginIframeId").css('height', "1px");
    $j("#login_popup_download_register").css("display", "none");
	$j("#blackbg").css("display","none");
}
function openPass()
{
	if ($j('#login_popup_pass').length > 0) {
			if (window["disableblackbg"] != true) {
				DisableScreen('blackbg', '#000000', '.7');
				$j('#blackbg').css('display', 'block');
			}	
		
			$j('span#user_action').text('downloading');
			$j('input#user_action').val('Download');
			$j('span#overlay_action').text('download');

			$j('#login_popup_pass').css('display', 'block');
			var source = $j('#login_popup_pass iframe').attr('src');
			source  = source + "&rand=" + Math.random();
			$j('#login_popup_pass iframe').attr('src',source);
			if (typeof (dsmetrics) != 'undefined') {
				dsmetrics.track(new DSMActivity("open-register-pass", "", dsmetrics.ActivityObjType.RegisterPopup, 0, dsmetrics.ActivityActionType.View, [new DSMOtherInfo("pageName", pageName)]));
			}
		}
		else {
			setTimeout(openPass, 100);
		}
}
function closePass() {
	try {
		if (top != window && top.closeRegisterDownload) {
			top.closeRegisterDownload();
			return;
		}
	} catch (e) {
	}
	$j('input#overload_premium').val(0);
	$j("#loginIframeId").css('height', "1px");
	$j("#login_popup_pass").css("display", "none");
	$j("#blackbg").css("display", "none");
}

function clickRegister(clientId, emailId, errorId, buttonId) {
    if (isCheckingEmail) {
        setTimeout(function() { clickRegister(clientId, emailId, errorId, buttonId); }, 100);
    }
    else if (isValidEmail && validateRegister(emailId, errorId, buttonId))
    {
        __doPostBack(clientId, null);
    }
   }
   function clickRegisterAjax(clientId, emailId, errorId, buttonId) {
   	if (isCheckingEmail) {
   		setTimeout(function() { clickRegisterAjax(clientId, emailId, errorId, buttonId); }, 100);
   	}
   	else if (isValidEmail && validateRegister(emailId, errorId, buttonId)) {
   		pageLogin.Register($j("form").serialize());
   	}
   }

   function clickLogin(clientId, usernameId, passwordId, errorId, buttonId) {
   	if (validateLogin(usernameId, passwordId,errorId, buttonId)) {
   		__doPostBack(clientId, null);
   	}
   }

   function clickLoginAjax(clientId, usernameId, passwordId, errorId, buttonId) {
   		if (validateLogin(usernameId, passwordId,errorId, buttonId)) {

   			pageLogin.Login($j("form").serialize());
   		}
   	}
   	// Defualt error id 'top-err-msg-register'
   	// Defualt error id 'top-err-msg-register'
   	function validateRegister(emailId, errorId, buttonId, disableBtn) {
   	    error = "";

   	    if (disableBtn == null)
   	        disableBtn = true;
   	    if (disableBtn)
   	        disableButton(buttonId);

   	    var email = $j("#" + emailId);
   	    email.attr("class", "");
   	    email.val(email.val().trim());

   	    if (email.val().length === 0)
   	        error += '<li>Email is required</li>';
   	    else if (email.val().toLowerCase() === 'docstoc@docstoc.com')
   	        error += '<li>Illegal email</li>';
   	    else if (!isValidateEmail(email.val()))
   	        error += '<li>Invalid email</li>';
   	    if (error.length > 0)
   	        email.attr('class', 'error-style');

   	    if ($j("#bizVsPersonal").length > 0) {
   	        var radioBtn = $j('input[name=bizvsquestion]:checked', '#aspnetForm').val();
   	        if (!(radioBtn || (radioBtn == "business" || radioBtn == "personal"))) {
   	            error += "<li>Please select business or personal</li>";
   	            $j('#bizvspan').attr('class', 'error-label');
   	        }
   	        else
   	            $j('#bizvspan').attr('class', '');
   	    }

   	    if (error.length > 0) {
   	        showError(errorId);
   	        enableButton(buttonId);
   	        return false;
   	    }
   	    else {
   	        return true;
   	    }
   	}

   	function validateRegisterPhone(firstId, lastId, emailId, phone1Id, phone2Id, phone3Id, errorId, buttonId, disableBtn) {
   		error = "";

   		if (disableBtn == null) {
   			disableBtn = true;
   		}
   		if (disableBtn) {
   			disableButton(buttonId);
   		}
   		var email = $j("#" + emailId);
   		email.attr("class", "");
   		email.val(email.val().trim());

   		var first = $j("#" + firstId);
   		first.attr("class", "");
   		first.val(first.val().trim());

   		var last = $j("#" + lastId);
   		last.attr("class", "");
   		last.val(last.val().trim());

   		var phone1 = $j("#" + phone1Id);
   		phone1.attr("class", "phoneItem");
   		phone1.val(phone1.val().trim());
   		var phone2 = $j("#" + phone2Id);
   		phone2.attr("class", "phoneItem");
   		phone2.val(phone2.val().trim());
   		var phone3 = $j("#" + phone3Id);
   		phone3.attr("class", "phoneItem");
   		phone3.val(phone3.val().trim());

   		if (first.val().length === 0) {
   			error += '<li>First Name is required</li>';
   			first.attr('class', 'error-style');
   		}
   		if (last.val().length === 0) {
   			error += '<li>Last Name is required</li>';
   			last.attr('class', 'error-style');
   		}

   		if (email.val().length === 0) {
   			error += '<li>Email is required</li>';
   			email.attr('class', 'error-style');
   		}
   		else if (email.val().toLowerCase() === 'docstoc@docstoc.com') {
   			error += '<li>Illegal email</li>';
   			email.addClass('error-style');
   		}
   		else if (!isValidateEmail(email.val())) {
   			error += '<li>Invalid email</li>';
   			email.attr('class', 'error-style');
   		}
   		if (phone1.val().length === 0 || phone2.val().length === 0 || phone3.val().length === 0) {
   			error += '<li>Phone Number is required</li>';
   			if (phone1.val().length === 0) {
   				phone1.attr('class', 'phoneItem error-style');
   			}
   			if (phone2.val().length === 0) {
   				phone2.attr('class', 'phoneItem error-style');
   			}
   			if (phone3.val().length === 0) {
   				phone3.attr('class', ' phoneItem error-style');
   			}
   		}
   		else if (phone1.val().length != 3 && phone2.val().length != 3 || phone3.val().length != 4) {
   			error += '<li>Phone Number is invalid</li>';
   			if (phone1.val().length != 3) {
   				phone1.attr('class', 'phoneItem error-style');
   			}
   			if (phone2.val().length != 3) {
   				phone2.attr('class', 'phoneItem error-style');
   			}
   			if (phone3.val().length != 4) {
   				phone3.attr('class', 'phoneItem error-style');
   			}
   		}



   		if (error.length > 0) {
   			showError(errorId);
   			enableButton(buttonId);
   			return false;
   		}
   		else {
   			return true;
   		}
   	}

   	function validateQuestions(errorId, buttonId, disableBtn) {
   		error = "";
   		if (disableBtn == null) {
   			disableBtn = true;
   		}
   		if (disableBtn) {
   			disableButton(buttonId);
   		}
   		$j("#question_1").removeClass('error-style');
   		$j("#question_2").removeClass('error-style');
   		$j("#question_3").removeClass('error-style');

   		if ($j("#question_1").val() == "0") {
   			$j("#question_1").addClass('error-style');
   			error += '<li>Question 1 is required</li>';
   		}
   		if ($j("#question_2").val() == "0") {
   			$j("#question_2").addClass('error-style');
   			error += '<li>Question 2 is required</li>';
   		}
   		if ($j("#question_3").val() == "0") {
   			$j("#question_3").addClass('error-style');
   			error += '<li>Question 3 is required</li>';
   		}

   		if (error.length > 0) {
   			showError(errorId);
   			enableButton(buttonId);
   			return false;
   		}
   		else {
   			return true;
   		}
   	}

   	function validateQuestions2(errorId, buttonId, disableBtn) {
   		error = "";
   		if (disableBtn == null) {
   			disableBtn = true;
   		}
   		if (disableBtn) {
   			disableButton(buttonId);
   		}
   		$j("#question_4").removeClass('error-style');
   		$j("#question_5").removeClass('error-style');
   		$j("#question_6").removeClass('error-style');
   		$j("#question_7").removeClass('error-style');
   		$j("#question_8").removeClass('error-style');

   		if ($j("#question_4").val() == "0") {
   			$j("#question_4").addClass('error-style');
   			error += '<li>Question 4 is required</li>';
   		}
   		if ($j("#question_5").val() == "0") {
   			$j("#question_5").addClass('error-style');
   			error += '<li>Question 5 is required</li>';
   		}
   		if ($j("#question_6").val() == "0") {
   			$j("#question_6").addClass('error-style');
   			error += '<li>Question 6 is required</li>';
   		}
   		if ($j("#question_7").val() == "0") {
   			$j("#question_7").addClass('error-style');
   			error += '<li>Question 7 is required</li>';
   		}
   		if ($j("#question_8").val() == "0") {
   			$j("#question_8").addClass('error-style');
   			error += '<li>Question 8 is required</li>';
   		}

   		if (error.length > 0) {
   			showError(errorId);
   			enableButton(buttonId);
   			return false;
   		}
   		else {
   			return true;
   		}
   	}

   	function disableButton(buttonId) {
   		$j("#" + buttonId).hide();
   		$j('.wait').show();
   	}

   	function enableButton(buttonId) {
   		$j("#" + buttonId).show();
   		$j('.wait').hide();
   	}

   	function showGreenCheck(item) {

   		if ($j(item).val() != "0") {
   			$j(item).parent().children('.icon_green_check').show();
   		}
   		else {
   			$j(item).parent().children('.icon_green_check').hide();
   		}
   	}

   	function validateLogin(usernameId, passwordId, errorId, buttonId) {

   		
   		error = "";
   		var username = $j("#" + usernameId);
   		var password = $j("#" + passwordId);
   		disableButton(buttonId);

   		if (username.val().trim().length == 0 || password.val().trim().length == 0) {
   			error = '<li>Username and Password is required</li>';
   		}
   		if (error.length > 0) {
   			username.attr("class", "error-style");
   			password.attr("class", "error-style");
   			showError(errorId);
   			username.focus();
   			username.trigger("focus");
   			enableButton(buttonId);
   			return false;
   		}
   		else {
   			return true;
   		}
   	}

   	function showError(id) {
   		var errorId = 'top-err-msg';
   		if (id) { errorId = id; }
   		$j("#" + errorId).html('<ul>' + error + '</ul>').hide().fadeIn();
   	}

   	function hideError(id) {
   		var errorId = 'top-err-msg';
   		if (id) { errorId = id; }
   		$j("#" + errorId).fadeOut().html('').hide();
   	}

   	function tryOpenLoginProactive() {

   		var cookieval = getCookie('loginproactive');
   		if (cookieval == null || cookieval != '1') {
   			var pages_visited = getCookie("pages_visited");
   			if (pages_visited == 2 && fromSearch) {
   				if ($j('#login_popup_download_register').css('display') != 'block') {
   					logOverlay("Download", 7);
   					openLoginProactive('.step1');
   				}
   			}
   			setCookie('loginproactive', '1');
   		}
   	}

   	function openLoginProactive(step, type) {

   		if ($j('#document-overlay-proactive').css('display') == 'none') {
   			$j('#document-overlay-proactive').fadeIn(1000);
   		}
   		DisableScreen('blackbg', '#000000', '.7');
   		$j('#blackbg').fadeIn(1000);
   		if (type) {
   			if (type == 'Print') {
   				isPrint = true;
   			}
   			else {
   				isPrint = false;
   			}
   		}
   		$j('input#user_action').val(type);
   		$j('.step1').hide();
   		$j('.step2').hide();
   		$j('.step3').hide();
   		$j('.user-action-text').html(type);
   		$j(step).fadeIn(1000);
   		if ($j(step + " input")[0] != null) {
   			$j(step + " input")[0].focus();
   		}


   	}

   	function closeLoginProactive() {
   		$j('#document-overlay-proactive').hide();
   		if ($j('#blackbg')) $j('#blackbg').hide();

   	}

   	function validateEmail(emailID, errorID, buttonID) {
   		error = "";
   		var emailField = $j("#" + emailID);

   		if (emailField.length > 0 && emailField.val().length > 0) {
   			//disableButton(buttonID);
   			isCheckingEmail = true;
   			$j.getJSON('/login/CheckEmail.ashx', 'e=' + emailField.val(),
   				function(data) {
   					//enableButton(buttonID);
   					isCheckingEmail = false;
   					if ((data.status == 2) && (data.verified == true)) {
   					    error = '<li>This email address already has an account associated with it.<br />If you forgot your password please <a href="/login/?forgotpassword=1">click here</a></li>';
   						showError(errorID);
   						isValidEmail = false;
   						return false;
   					}
   					else {
   						hideError(errorID);
   						isValidEmail = true;
   					}

   					return true;
   				}
				);
   		}
   	}

   	function sendPasswordReminder(emailID, errorID, buttonID) {
   		error = "";
   		var emailField = $j("#" + emailID);

   		if (emailField.length > 0 && emailField.val().length > 0) {
   			disableButton(buttonID);

   			$j.getJSON('/login/SendPasswordReminder.ashx', 'e=' + emailField.val(),
   				function(data) {
   					enableButton(buttonID);

   					//set some kind of notification that it worked
   					var msgBox = $j('#top-err-msg-reminder');

   					msgBox.html('<span class="icon_green_check_circle"></span>&nbsp;Password reminder sent')
	   					.css("display", "block")
	   					.fadeIn();
   					return true;
   				}
				);
   		}
   	}

   	/****   LoginPopupDownloadWithPassword  ****/

   	function ValidatePassword(passwordId) {
   		var myerror = "";

   		var passwordField = $j("#" + passwordId);

   		if (passwordField != null) {
   			var password = passwordField.val().trim();
   			if (password.length < 4)
   				myerror += "<li>password must contain at least 4 characters</li>";
   			if (password.contains(' '))
   				myerror += "<li>password cannot contain spaces</li>";
   			if (password.match('^[a-zA-Z0-9]*$') == null)
   				myerror += "<li>password must use alphanumeric characters only</li>";
   		}
   		return myerror;
   	}

   	function clickRegisterWithPassword(clientId, emailId, errorId, buttonId, passwordId) {
   		if (validateRegisterWithPassword(emailId, errorId, buttonId, passwordId)) {
   			__doPostBack(clientId, null);
   		}
   	}
   	function clickRegisterPhone(clientId, firstId, lastId, emailId, phone1Id, phone2Id, phone3Id, errorId, buttonId, disableBtn) {
   		if (validateRegisterPhone(firstId, lastId, emailId, phone1Id, phone2Id, phone3Id, errorId, buttonId, disableBtn)) {
   			__doPostBack(clientId, null);
   		}
   	}


   	function validateRegisterWithPassword(emailId, errorId, buttonId, passwordId, disableBtn) {
   		error = "";
   		if (disableBtn == null) {
   			disableBtn = true;
   		}
   		if (disableBtn) {
   			disableButton(buttonId);
   		}


   		//vars
   		var email = $j("#" + emailId);
   		email.removeClass('error-style');
   		email.val(email.val().trim());

   		var password = $j("#" + passwordId);
   		password.removeClass('error-style');
   		password.val(password.val().trim());

   		//email
   		if (email.val().length == 0) {
   			error += '<li>Email is required</li>';
   			email.addClass('error-style');
   		}
   		else if (email.val.toLowerCase() == 'docstoc@docstoc.com') {
   			error += '<li>Illegal email</li>';
   			email.addClass('error-style');
   		}
   		else if (!isValidateEmail(email.val())) {
   			error += '<li>Invalid email</li>';
   			email.addClass('error-style');
   		}

   		//password
   		var passwordError = ValidatePassword(passwordId);
   		if (passwordError != '') {
   			error += passwordError;
   			password.addClass('error-style');
   		}


   		if (error.length > 0) {
   			showError(errorId);
   			enableButton(buttonId);
   			return false;
   		}
   		else {
   			return true;
   		}
   	}


   	function handleNumber(e, func, arg1) {

   		var keyPressed;

   		if (window.event) // IE
   		{
   			keyPressed = event.keyCode;
   		}
   		else if (e.which) // Netscape/Firefox/Opera
   		{
   			keyPressed = e.which;
   		}

   		e = e || window.event;

   		if (keyPressed == 46 || keyPressed == 8) {
   			// let it happen, don't do anything
   		}
   		else {
   			// Ensure that it is a number and stop the keypress
   			if (keyPressed < 48 || keyPressed > 57) {
   				e.preventDefault();
   				return false;
   			}
   		}
   		return true;
   	}

   	function handleDataLength(e, func, arg1) {
   		e = e || window.event;
   		targ = e.target || e.srcElement;

   		if (targ.value.length >= arg1) {
   			func(e);
   		}
   	}

   	function regIsDigit(fData) {
   		var reg = new RegExp("^[0-9]$");
   		return (reg.test(fData));
   	}

   	function logPhonePopup(phoneDocId) {
   		var value = $j("#phone_stat_url").val()
   		if (value != null && value != '' && phoneDocId != '') {
   			$j.ajax({
   					url: value + "?doc_id=" + phoneDocId,
   					type: 'GET'
   				});
   		}
   	}
   	var pageLogin;
   	var dSLogin = function(options) {
   		if (options == undefined) {
   			options = {
   				pageId: 0,
   				docId: 0
   			};
   		}
   		var callback = function() { };

   		this.pageId = options.pageId;
   		this.docId = options.docId;

   		var callAjax = function(post, urlHandler) {
   			$j.ajax({
   				//url: "/Login/GetLoginReg.ashx",
   				url: urlHandler,
   				data: post,
   				dataType: 'json',
   				type: 'POST', /* change this to POST */
   				success: function(data) {
   					callback(data);
   				},
   				error: function(error) { }
   			});
   		};

   		var formatHtmlResults = function(html) {
   			if (typeof (html) != 'undefined' && html != null) {
   				html = html.replace(/&lt;/g, "<");
   				html = html.replace(/&gt;/g, ">");
   				html = html.replace(/&quot;/g, '"');
   				html = html.replace(/&amp;nbsp;/g, '&nbsp;');
   				html = html.replace(/&amp;raquo;/g, '&raquo;');
   				html = html.replace(/&amp;laquo;/g, '&laquo;');
   				html = html.replace(/&amp;rdquo;/g, '&rdquo;');
   				html = html.replace(/&amp;ldquo;/g, '&ldquo;');
   			}
   			//html = unescape(html);
   			return html;
   		};


   		var handleReturnAction = function(data) {
   			switch (data.ActionType) {
   				case 1:
   					document.location = data.Action;
   					break;
   				case 2:
   					$j("#site-container").append(formatHtmlResults(data.Html));
   				default:
   			}
   		};

   		this.AlertMe = function() {
   			alert(this.pageId);
   		};

   		this.LoadPopup = function() {
   			callAjax(
   				{
   					pageId: this.pageId,
   					docId: this.docId
   				}, "/Login/GetLoginReg.ashx?requestType=1");
   			callback = function(data) {
   				$j("#site-container").append(formatHtmlResults(data.Html));
   				FB.XFBML.parse();
   			};
   		};


   		this.Register = function(serializedForm) {
   			var handleRegError = this.HandleRegError;
   			serializedForm = serializedForm + "&pageId=" + this.pageId + "&docId=" + this.docId;
   			callAjax(
   				serializedForm, "/Login/GetLoginReg.ashx?requestType=2");
   			callback = function(data) {
   				if (data.Success) {
   					enableButton('btnRegister');

   					handleReturnAction(data);
   				}
   				else {
   					handleRegError(data);
   				}
   				//$j("#site-container").append(data.Html);
   				//FB.XFBML.parse();
   			};
   		};

   		this.Login = function(serializedForm) {
   			var handleLoginError = this.HandleLoginError;
   			serializedForm = serializedForm + "&pageId=" + this.pageId + "&docId=" + this.docId;
   			callAjax(
   				serializedForm, "/Login/GetLoginReg.ashx?requestType=3");
   			callback = function(data) {
   				if (data.Success) {
   					handleReturnAction(data);
   					enableButton('btnLogin');
   				}
   				else {
   					handleLoginError(data);
   				}
   				//$j("#site-container").append(data.Html);
   				//FB.XFBML.parse();
   			};
   		};

   		this.FBLogin = function(serializedForm) {
   			var handleFBLoginError = this.HandleFBLoginError;
   			serializedForm = serializedForm + "&pageId=" + this.pageId + "&docId=" + this.docId;
   			callAjax(
   				serializedForm, "/Login/GetLoginReg.ashx?requestType=4");
   			callback = function(data) {
   				if (data.Success) {
   					handleReturnAction(data);
   				}
   				else {
   					handleFBLoginError(data);
   				}
   				//$j("#site-container").append(data.Html);
   				//FB.XFBML.parse();
   			};
   		};

   		this.HandleLoginError = function(data) { };
   		this.HandleRegError = function(data) { };
   		this.HandleFBLoginError = function(data) { };
   	};

		function addQuestionToPopupDownload() {

			$j("#top-err-msg-register:visible").each(function() {
				if(testIfSelected()) {
					$j("#coverLogins").hide();
				}
			});

			function testIfSelected() {
				return $j("#bizVsPersonal input:checked").length > 0;
			}

			$j("#coverLogins").click( function() {
				$j("#bizVsPersonal .reqMsg").html("You must select either 'business' or 'personal' to get access to the document");
			});

			$j("#bizVsPersonal input[type='radio']").change(function() {
				if(testIfSelected()) {
					$j("#coverLogins").hide();
					$j("#bizVsPersonal .reqMsg").html("Thank You").addClass("success");
				}
			});
		}
   
