var emrireg = /^[a-zA-Z]{2,30}$/;
var emailreg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;   
// validimi kontakt forma
    $("#contact1").submit(function(){
    var x = $("#name").val();
	var y = $("#subject").val();
	var z = $("#email").val();
	var w = $("#message").val();
		if(x == "" && y == "" && z == "" && w == "") {
			alert("Ju lutem plotesoni te dhenat!!!");
	    	return false;
		}
		else if (x == "") {
	    	alert("Duhet te shkruani emrin!!!");
	    	return false;
		}

		else if (!emrireg.test(x)) {
	    	alert("Emri duhet te jete valid (maksimum 30 karaktere)!!!");
	    	return false;
		}

		else if(z == "") {
			alert("Duhet te shkruani emailin!!!");
			return false;
		}

		else if(!emailreg.test(z)) {
			alert("Emaili duhet te jete valid!!!");
			return false;
		}

		else if(y == "" && y.length>35) {
			alert("Duhet te shkruani titullin (maksimum 35 karaktere)!!!");
			return false;
		}
		
		else if(w == "" && w.length>255 ) {
			alert("Ju lutem shkruani nje mesazh (maksimum 255 karaktere)!!!");
			return false;
		}

    });

// validimi login forma
$("#profilforma").submit(function(){
    var x = $("#username").val();
	var y = $("#password").val();
		
		if (x == "") {
	    	alert("Duhet te shkruani username!!!");
	    	return false;
		}
		else if(y == "") {
			alert("Duhet te shkruani passwordin!!!");
			return false;
		}

    });

//validimi sign up forma

$("#signup1").submit(function(){
	    var n = $("#name").val();
		var l = $("#lastname").val();
		var e = $("#email").val();
		var u = $("#username1").val();
		var p = $("#password1").val();
		var pp = $("#confirmpassword").val();

		if(n == "" && l == "" && e == "" && u == "" && p == "" && pp == "") {
			alert("Ju lutem plotesoni te dhenat.");
	    	return false;
		}
		
		else if (n == "") {
	    	alert("Duhet te shkruani emrin!!!");
	    	return false;
		}

		else if (!emrireg.test(n)) {
	    	alert("Emri duhet te jete valid (maksimum 35 karaktere)!!!");
	    	return false;
		}

		else if(l == "") {
			alert("Duhet te shkruani mbiemrin!!!");
			return false;
		}

		else if (!emrireg.test(l)) {
	    	alert("Mbiemri duhet te jete valid (maksimum 35 karaktere)!!!");
	    	return false;
		}

		else if(e == "") {
			alert("Duhet te shkruani emailin!!!");
			return false;
		}

		else if(u == "" && u.length>35) {
			alert("Duhet te shkruani username !!!");
			return false;
		}

		else if(p == "") {
			alert("Duhet te shkruani passwordin!!!");
			return false;
		}

		else if(pp == "") {
			alert("Duhet ta konfirmoni passwordin!!!");
			return false;
		}

		else if(!emailreg.test(e)) {
			alert("Emaili qe keni shtypur nuk eshte valid!!!");
			return false;
		}

		else if(p != pp) {
			alert("Passwordi nuk eshte konfirmuar, shtypeni perseri!!!");
			$("#password1").val("");
			$("#confirmpassword").val("");
			return false;
		}
		else if(p.length < 6) {
			alert("Passwordi duhet te jete minimum 6 karaktere");
			return false;
		}
		else if(p.length > 16) {
			alert("Passwordi duhet te jete maksimum 16 karaktere");
			return false;
		}

    });
// validimi edit profile

$("#profilforma").submit(function(){
	var n = $("#name").val();
	var l = $("#lastname").val();

	if (n == "") {
    	alert("Duhet te shkruani emrin!!!");
    	return false;
	}

	else if (!emrireg.test(n)) {
    	alert("Emri duhet te jete valid (maksimum 35 karaktere)!!!");
    	return false;
	}

	else if(l == "") {
		alert("Duhet te shkruani mbiemrin!!!");
		return false;
	}

	else if (!emrireg.test(l)) {
    	alert("Mbiemri duhet te jete valid (maksimum 35 karaktere)!!!");
    	return false;
	}
});
