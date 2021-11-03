//Jazmin Vagha 16941106
// This file contains all the javascript functions needed for transporting the data from
// the forms, when the onclick parameter is used in a form, the data gets sent to these
// functions

var xhr = createRequest();


// this function gets all the data sent from the book a taxi form, this means when the function
// gets called using the onclick parameter, the php file is entered as the datasource, the div id 
// is the targetDiv and all the form inputs are required. When the request is created, the url is 
// getting all the data that the customer is inputting. The xhr is opened for "GETing" the data. 
// If successful, the data will be placed in the server. 
function getInputs(dataSource, targetDiv, aCustName, aPhoneno, aUnitno, aStreetno, aStreetname, aSuburb, aDestsuburb, aDate, aTime)  {
    if(xhr) {
	    var place = document.getElementById(divID);
	    var url = dataSource+"?custName="+aCustName+"&phoneNo="+aPhoneno+"&unitNo="+aUnitno+"&streetNo="+aStreetno+"&streetName="+aStreetname+"&suburb="+aSuburb+"&destSuburb="+aDestsuburb+"&date="+aDate+"&time="+aTime;
	    xhr.open("GET", url, true);
	    xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
			place.innerHTML = xhr.responseText;
		    } 
	    }
	    xhr.send(null);
	} else {
        alert("XHR could not be set.")
    }
}  // end getData function()
//function to send data through to the source and update the admin html forms with the response
function assignTaxi(dataSource, targetDiv, refNum){
    if(xhr) 
	{
	    var place = document.getElementById(divID);
	    var url = dataSource+"?refNum="+refNum;
	    xhr.open("GET", url, true);
	    xhr.onreadystatechange = function() 
		{
			if (xhr.readyState == 4 && xhr.status == 200) 
			{
				place.innerHTML = xhr.responseText;
		   	} 
	    }
	    xhr.send(null);
	}
	else
	{
		alert("XHR could not be set");
	}
} // end function assignTaxi()

//function to call the source and update the user html forms with the response
function searchForTaxi(dataSource, targetDiv) {
    if(xhr) 
	{
	    var place = document.getElementById(divID);
	    var url = dataSource;
	    xhr.open("GET", url, true);
	    xhr.onreadystatechange = function() 
		{
			if (xhr.readyState == 4 && xhr.status == 200) 
			{
				place.innerHTML = xhr.responseText;
		   	} 
	    } 
	    xhr.send(null);
	}
	else
	{
		alert("XHR could not be set");
	}
} // end function searchTaxi()

