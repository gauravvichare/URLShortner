
	function validations()
	{
		if(usernameValidation()&&fnameValidation()&&fnameValidation()&&emailValidation()&&pwdValidation())
	    {
	    			return true;
		}
	    return false;
	}
	function fnameValidation()
	{
		var fname = document.getElementById('fname').value;
		var len = fname.length;
		if(len > 0)
		{
			return true;
		}
		alert("Enter first name having atleast 1 characters");
		document.getElementById('fname').style.background="#FFB2B2"
		return false;
	}
	function lnameValidation()
	{
		var lname = document.getElementById('lname').value;
		var len = lname.length;
		if(len > 0)
		{
			return true;
		}
		alert("Enter last name having atleast 1 ccharacters");
		document.getElementById('fname').style.background="#FFB2B2"
		return false;
	}	
	function color()
	{
		document.getElementById('p1').style.background="#FFB2B2"
		document.getElementById('p2').style.background="#FFB2B2"
	}
		
	function pwdValidation()
	{  	
		var p1 = document.getElementById('p1').value;  
        var p2 = document.getElementById('p2').value;  
        var len_p1 = p1.length;
        
        if(7 < len_p1)
   		{
   			if(p1 !== p2)
		    {
		   		alert("Password doesn't match. Enter correct password.");
		   		color();
		   		return false;
		    }  	
			return true;
		}
		else
		{
			alert("Password length must be min 8 char");
			color();
			return false;
		}	
	}
	
	function emailValidation()
	{
		var em = document.getElementById('email').value;
		var len = em.length;
    	var firstat = em.indexOf("@");
		var lastat = em.lastIndexOf("@");
		var dotpos = em.lastIndexOf(".");
		
		if((firstat===lastat)&&((firstat+1)<dotpos)&&firstat!=-1&&dotpos!=-1&&(em.charAt(dotpos+2)))
		{
			return true;				
		}
		else
		{
			alert("Enter valid email address");
			document.getElementById('email').style.background="#FFB2B2"
		    return false
		}
	}
		
	function usernameValidation()
	{
		var uname = document.getElementById('uname').value;
		var len = uname.length;
		if(len > 4)
		{
			return true;
		}
		alert("Enter Username having atleast 5 characters");
		document.getElementById('uname').style.background="#FFB2B2"
		return false;
	}

  
