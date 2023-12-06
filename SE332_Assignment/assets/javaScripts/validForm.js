<html>
 <head> 
<script> function validateForm() { 
var name = document.forms["Form"]["name"].value; 
var email = document.forms["Form"]["email"].value; 
var id = document.forms["Form"]["id"].value; 
var vehicleNo = document.forms["Form"]["vehicleno"].value;
 var chassisNo = document.forms["Form"]["chassisno"].value; 
var passportSoftCopy = document.forms["Form"]["passportsizephoto"].value; 

var nidSoftCopy = document.forms["Form"]["nidsoftcopy"].value;

 var presentAddress = document.forms["Form"]["presentaddress"].value; 

var permanentAddress = document.forms["Form"]["permanentaddress"].value;

if (name == "" || email == "" || id == "" || vehicleNo == "" || chassisNo == "" || passportSoftCopy == "" || nidSoftCopy == "" || presentaddress == "" || permanentaddress == "") 

{ alert("Please fill out all fields."); 
return false;
 
} 
}
</script>
</head> 
<body> 
<form name="Form" action="/submitForm" onsubmit="return validateForm()" method="post"> 

</form>
 </body> 
</html>
