function login()
{
//document.getElementById("login3").submit();
login3();
}

function login3()
{
var del = "&";
var post_data = "service_name=login_to_account3";
post_data += del + "application_name=" + document.getElementById("application_name").value;
post_data += del + "application_key=" + document.getElementById("application_key").value;
post_data += del + "user_name=" + document.getElementById("user_name").value;
post_data += del + "password=" + document.getElementById("password").value;
post_data += del + "pin=" + document.getElementById("pin").value;
var href = "/web_services/web_service.php";
$.ajax
	(
		{
		url: href, 
		type: "POST",
		data: post_data,
		success: function(result){ check_login_results(result); }
		}
	);

}

function check_login_results(result)
{
var res = JSON.parse(result);
var msg = "";
if(res.ws_status == "Success"){ goto_menu(result); }
else
	{
	document.getElementById("dialog_title").innerHTML = res.ws_status;
	document.getElementById("dialog_msg").innerHTML = res.ws_msg;	
	document.getElementById("om").click();
	}

}

function goto_menu(result)
{
alert("PATIENCE. UNDER CONSTRUCTION!!!");
record_security(result);
}

function record_security(result)
{

var post_data = "result=" + result;
var href = "/actions/record_security.php";
$.ajax
	(
		{
		url: href, 
		type: "POST",
		data: post_data,
		success: function(result){ do_nothing(); }
		}
	);
}

function do_nothing()
{
/* Do Nothing */	
}

