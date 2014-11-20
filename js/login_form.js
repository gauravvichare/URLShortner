		

	function validations()
	{
		if(usernameValidation()&&pwdValidation())
	    {
	    	return true;
	    }
	    return false;
	}
	
	function usernameValidation()
	{
		var uname = document.getElementById('uname').value;
		var len = uname.length;
		if(len > 4)
		{
			return true;
		}
		alert("Enter correct User name. ");
		color("uname");
		return false;
	}
	
	function pwdValidation()
	{  	
		var p1 = document.getElementById('pass').value;  
        var len_p1 = p1.length;

        if(7 < len_p1)
   		{
   				return true;
		}
		else
		{
			alert("Enter correct password.");
			color("pass");
			return false;
		}	
	}
	
    function color(box)
	{
		document.getElementById(box).style.background="#FFB2B2"
	}
	
