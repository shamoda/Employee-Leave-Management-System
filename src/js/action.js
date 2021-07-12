function loadData(data){
	if(data == "btn1"){
		alert("Leave request has been approved");
		document.getElementById("btn1").disabled = true;
		document.getElementById("btn2").style.display = "none";
		
	}
	else if (data == "btn11"){
		alert("Leave request has been approved");
		document.getElementById("btn11").disabled = true;
		document.getElementById("btn22").style.display = "none";
	}
	else if(data == "btn2"){
		alert("Leave request has been rejected");
		document.getElementById("btn1").style.display = "none";
		document.getElementById("btn2").disabled = true;
	}
	else if (data == "btn22"){
		alert("Leave request has been rejected");
		document.getElementById("btn11").style.display = "none";
		document.getElementById("btn22").disabled = true;
	}
	
}