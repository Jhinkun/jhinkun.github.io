<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<title> Login Page </title>  
<style>   
   body{
			background:url( "images/login.jpeg")center center no-repeat ;
			background-size: cover;
			overflow: hidden;
			object-fit: cover;
			width: 100%;
  			height: 100vh;
		}
.admin {   
        background-color: #4CAF50; 
        border-radius: 20px;  
        width: 100%;  
        color: black;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
	    text-align: center;
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        
    }

.home {   
        background-color: #f8f8f8; 
        border-radius: 10px;  
        width: 50%;
        height: 30px;  
        color: black;
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
	    text-align: center;
        font-size: 12px;
        font-family: 'Montserrat', sans-serif;
        
    }  
	
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
a:hover{
		opacity: 0.7;
	}
a{
		cursor: pointer;
	}
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        
	 margin-left: auto;
	 margin-right: auto;  
	 width: 30%;
	 text-align: center;
    }

.login{
    border-radius: 50px;
    margin-top: 150px;
    background-color: #273269D4;
    width: 30% ;
    height: 250px;
    text-align: center;
    margin-left: auto;
    margin-right: auto;  
    padding-top: 10px;
    padding-bottom: 70px;
	}
    h2{
        font-family: 'Montserrat', sans-serif;
        color:white;
    }
    p{
        font-family: 'Montserrat', sans-serif;
        color:white;
    }
    a{
        font-family: 'Montserrat', sans-serif;
        color:white;
    }
</style>   
</head>    
<body>    
	<div class="login">
		<center> <h2> LOG IN AS : </h2> </center>   
    	<center><p>Click the button to log in as Admin or Staff.</p></center>
		<div class="container">
			<button class="admin" onclick="document.location='adminlogin.php'">ADMIN</button>
       	    <button class="admin" onclick="document.location='stafflogin.php'">STAFF</button>
			<a onClick="document.location='index.html'"><button class="home">HOME</button></a>
		</div>
	</div>
</body>     
</html>  