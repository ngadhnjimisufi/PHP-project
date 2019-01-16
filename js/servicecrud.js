    $("#selectlista").change(function(){

    	if($(this).val() == "None")
    	{
    		$("#2").attr("src","images/serviceblank.png");
    		clear();
    	}
    	else{
	        var img = $('option:selected').attr('imgsrc');
	        var desc = $('option:selected').attr('pershkrimi');
	        var titulli = $('option:selected').html();
	        var imagestructure = "<img id='2' src='serviceimages/"+img+"'>";
	        $("#originaltitle").val(titulli);
	        $("#title").val(titulli);
	        $("#description").val(desc);
	        $("#2").attr("src","serviceimages/"+img)
    	}
    });

    $("#clear").click(clear);

    function clear(e)
    {
    	if(e)
    	e.preventDefault();	
    	$('#selectlista').prop('selectedIndex',0);
    	$("#2").attr("src","images/serviceblank.png")
    	$("#title").val("");
    	$("#originaltitle").val("");
    	$("#description").val("");
    	$("#serviceimg").val(null);
    }

    $("#delete").click(function(e){
    	if ($("#originaltitle").val().length==0){
    		alert('Duhet te selektoni nje service per ta fshire!');
    		e.preventDefault();
    	}
    	else if(confirm("Deshironi ta fshini kete service?"))
    		{}
    	
    	else{e.preventDefault();}
    });

    $("#create").click(function(){
    	if(fajllat())
    		return false;
    	else if(pershkrimi())
    		return false
    	else if(titulli())
    		return false
    	return true;
    });

    $("#update").click(function(){

    	if(pershkrimi())
    		return false
    	else if(titulli())
    		return false
    	else if(fajllat("asd"))
    			return false;
    	return true;
    });

    function fajllat(e){
    	var asd = $("#serviceimg")[0].files;

    	if(e && $("#serviceimg")[0].files.length>0){

    	  if(!asd[0].type.includes("png") && !asd[0].type.includes("jpeg") && !asd[0].type.includes("jpg"))
    		{
    			alert('Service duhet te posedoj imazh ne formatin (PNG, JPEG OSE JPG)!');
    			return true;
    		}
    	}
    	if (e==null){
    	  if($("#serviceimg")[0].files.length==0 || (!asd[0].type.includes("png") && !asd[0].type.includes("jpeg") && !asd[0].type.includes("jpg") ))
    		{
    			alert('Service duhet te posedoj imazh ne formatin (PNG, JPEG OSE JPG)!');
    			return true;
    		}
    	}
    	return false;
    }

    function pershkrimi(){
    	if($("#description").val().length>250 || $("#description").val().length<15)
    	{
    		alert('Pershkrimi duhet te jete 15 deri 250 karaktere!');
    		return true;
    	}
    	return false;
    }

    function titulli(){
    	if($("#title").val().length > 15 || $("#title").val().length < 3){
    		alert('Titulli duhet te jete 3 deri 15 karaktere!');
    		return true;
    	}
    	return false;
    }