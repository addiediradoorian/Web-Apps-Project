function validate_first_name(){
	var firstname= document.getElementById("firstnamevalue").value ;
			
	if (firstname.length < 1) {
		var fnerror=document.getElementById("fnerror");
		fnerror.innerHTML = "Enter a first name";
		return false;
	};
}
	
function last(){
	var lastname= document.getElementById("lastnamevalue").value ;
			
	if (lastname.length < 1) {
		var lnerror=document.getElementById("lnerror");
		lnerror.innerHTML = "Enter a last name";
		return false;
	};	
}
function validate_email(){
	var email= document.getElementById("emailvalue").value ;
			
	if (email.length < 7) {
		var eerror=document.getElementById("eerror");
		eerror.innerHTML = "Enter an email";
		return false;
	};
}

function validate_password1(){
	var password1= document.getElementById("passwordvalue1").value ;
			
	if (password1.length < 6) {
		var pw1error=document.getElementById("pw1error");
		pw1error.innerHTML = "Enter a password, minimum 6 characters";
		return false;
	};	
}
	
function validate_password2(){
	var password2= document.getElementById("passwordvalue2").value ;
			
	if (password1.length < 1) {
		var pw2error=document.getElementById("pw2error");
		pw2error.innerHTML = "Enter a first name";
		return false;
	};
}
	
function matchpasswords(){
	var password1= document.getElementById("passwordvalue1").value ;
	var password2= document.getElementById("passwordvalue2").value ;
	
	if (password1 !== password2) {
	var pwmatcherror= document.getElementByID("pwmatcherror");
	pwmatcherror.innerHTML = "Passwords don't match!";
	return false;
	};
}
	
