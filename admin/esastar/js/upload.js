function check_file(typ, id)
{

var retval = false;
var fu = document.getElementById(id);
var sz = fu.files[0].size;
var limit = 2000000;
document.getElementById("btn_file").disabled = false;
if(typ == "tn"){ limit = 100000; }
var nm = fu.files[0].name;
if(sz > 100000){ alert("File too big."); }
if(!is_image(fu.value))
	{ 
	alert("Not an image file."); return; 
	}
retval = true;
document.getElementById("btn_file").disabled = false;
return retval;

}
	
function is_image(flname)
{

var retval = false;
flname = flname.toLowerCase();
var regex = new RegExp("(.*?)\.(png|jpg|jpeg|gif)$");
if((regex.test(flname))){ retval = true; }
return retval;

}

function file_upload(id)
{    

document.getElementById(id).submit();

}