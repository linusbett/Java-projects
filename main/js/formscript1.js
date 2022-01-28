function formsubmit() {
    var courttpe = document.getElementById('courttype').value;
    var casetype = document.getElementById('casetype').value;
    var category = document.getElementById('category').value;
    var caseno = document.getElementById('caseno').value;
    var parties = document.getElementById('parties').value;
    var registry = document.getElementById('registry').value;
    var officers = document.getElementById('officers').value;
    var daterecieved = document.getElementById('daterecieved').value;
    var finalorder = document.getElementById('finalorder').value;
    var dateoffinal = document.getElementById('dateoffinal').value;
    var retention = document.getElementById('retention').value;
    var dateofdisposal = document.getElementById('dateofdisposal').value;
    var remarks = document.getElementById('remarks').value;
    //store all the submitted data in astring.
    var formdata = 'courttype=' + courttype + '&casetype=' + casetype + '&category=' + category + '&caseno=' + caseno + '&parties=' + parties +'&registry=' + registry+ '&officers=' + officers + '&daterecieved=' + daterecieved +'&finalorder=' + finalorder + '&dateoffinal=' + dateoffinal + '&retention=' + retention+ '&dateofdisposal=' + dateofdisposal+ '&remarks=' + remarks;
	// validate the form input
	if (courttype == '' ) {
		alert("Please select court type");
		return false;
	}
	if(casetype == '') {
		alert("Please select case type");
		return false;
	}
	if(category == '') {
		alert("Please select category");
		return false;
	}
	if(caseno == '') {
		alert("Please enter caseno");
		return false;
	}
  if(parties == '') {
		alert("Please enter the parties");
		return false;
	}
  if(registry == '') {
		alert("Please select Creating registry");
		return false;
	}
  if(officers == '') {
		alert("Please select recieving officers");
		return false;
	}
  if(daterecieved == '') {
		alert("Please enter date recieved");
		return false;
	}
  if(finalorder == '') {
		alert("Please enter final orders");
		return false;
	}
  if(dateoffinal == '') {
		alert("enter date of final order");
		return false;
	}
  if(retention == '') {
		alert("Please enter retention period");
		return false;
	}
  if(dateofdisposal == '') {
		alert("Please enter date of disposal");
		return false;
	}
  if(remarks == '') {
		alert("Please enter the remarks");
		return false;
	}
	else {
	// AJAX code to submit form.
	$.ajax({
		 type: "POST",
		 url: "storedata.php", //call storedata.php to store form data
		 data: formdata,
		 cache: false,
		 success: function(html) {
		  alert(html);
		 }
	});
	}
	return false;
}
