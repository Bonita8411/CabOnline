// Jazmin Vagha 16941106
// this function validates to see if all the required fields in the 
// book a taxi form has been filled out. If a value is left blank,
// there will be a pop up error message saying that the specific 
// field must be filled out

function validateForm(){ 
	var law = true;
if(document.getElementById("custName").value == ""){
	alert("Your name is required, Please enter your name!");
	document.getElementById("custName").focus();
	law= false;
}
if(document.getElementById("phoneNo").value == ""){
	alert("Your phone number is required, Please enter your phone number!");
	document.getElementById("phoneNo").focus();
	law= false;
}

if(document.getElementById("streetNo").value == ""){
	alert("Your street number is requried, Please enter your street number!");
	document.getElementById("streetNo").focus();
	law= false;
}
if(document.getElementById("streetName").value == ""){
	alert("Your street name is required, Please enter your street name!");
	document.getElementById("streetName").focus();
	law= false;
}

if(document.getElementById("suburb").value == ""){
	alert("Your suburb is required, Please enter the suburb!");
	document.getElementById("suburb").focus();
	law= false;
}
if(document.getElementById("date").value == ""){
	alert("Your date of pick up is required, Please enter the date of pick up!");
	document.getElementById("date").focus();
	law= false;
}

if(document.getElementById("time").value == ""){
	alert("Your time of pick up is required, Please enter the time of pick up!");
	document.getElementById("time").focus();
	law= false;
}

if(document.getElementById("destSuburb").value == ""){
	alert("Your destination is required, Please enter your destination!");
	document.getElementById("destSuburb").focus();
	law= false;
}

getInputs('booking.php', 'targetDiv', document.getElementById("custName").value, document.getElementById("phoneNo").value, 
document.getElementById("unitNo").value, document.getElementById("streetNo").value, 
document.getElementById("streetName").value, document.getElementById("suburb").value, 
document.getElementById("date").value, document.getElementById("time").value,  document.getElementById("destSuburb").value);

}

