<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    
<?php 

session_start();

	include("Database1.php");



	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "select * from ens where username = '$username' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						

                      	$_SESSION['username'] = $user_data['username'];
						$_SESSION['profile_picture'] = $user_data['profile_picture'];
                        
                        $_SESSION['Matricule'] = $user_data['Matricule'];


                   
                       
						header("Location: teatcher.php"); 
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?> 




    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

*{
    font-family: 'Poppins', sans-serif;
}
.wrapper{
    
    background: #3e3e5f;
    background: -webkit-linear-gradient(-180deg, #3e3e5f,#3e3e5f , hsl(240, 15%, 51%) ,#91a9b6);


    
    padding: 0 20px 0 20px;
    
}
.main{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
header
{
    font-size: 20px;
    font-family: sans-serif;
}
.img{
    
    height: 13vh;
    width: 60px;
}
.side-image{
    background-image: url("./a9584cdf7dbb8d410f355e34dc661e82.jpg") ;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    border-radius: 5px 0 0 5px;
    position: relative;
   overflow: hidden;
   max-width: 100%;
}
.side-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 5px 0 0 5px;
    background-color:hwb(150 4% 94% / 0.356); 
    backdrop-filter: blur(2px); 
  }
  .hh 
  {
   
    justify-content: center;
    align-items: center;
    padding-top: 250px;
    padding-left: 70px; 
    color: #fff;
    font-weight: bold;
    position: absolute;
  }
  .hh button 
  {
     border: 2px solid #3e3e5f;
       background-color: transparent;
       padding: 9px;
       border-radius: 20px;
      margin-left: 60px;
      font-weight: bold;
     width: 150px;



  }
   button:hover
  {
    background-color: #019477;
    color: #000;
  }
  .side-image h2
  {
    font-weight: bold;
    padding-left: 60px;
    font-family: serif;
    
  }
  .side-image h4
  {
    font-size: small;
    padding-left: 60px;
 font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-weight: bold;
   
  
    
  }
.row{
  width:  900px;
  height:550px;
  border-radius: 10px;
  background: #fff;
  padding: 0px;
  box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.2);
}
.text{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.text p{
    color: #fff;
    font-size: 20px; 
}
i{
    font-weight: 400;
    font-size: 15px;
}
.right{
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}
.input-box{
  width: 330px;
  box-sizing: border-box;
}
img{
    width: 35px;
    position: absolute;
    top: 30px;
    left: 30px;
}
.input-box header{
    font-weight: 700;
    text-align: center;
    margin-bottom: 45px;
}
.input-field{
    display: flex;
    flex-direction: column;
    position: relative;
    padding: 0 10px 0 10px;
}
.input{
    height: 45px;
    width: 100%;
    background: transparent;
    border: none;
    border-bottom: 1px solid hsl(169, 46%, 23%);
    outline: none;
    margin-bottom: 20px;
    color: #40414a;
}
.input-box .input-field label{
    position: absolute;
    top: 10px;
    left: 10px;
    pointer-events: none;
    transition: .5s;
}
.input-field input:focus ~ label
   {
    top: -10px;
    font-size: 13px;
  }
  .input-field input:valid ~ label
  {
   top: -10px;
   font-size: 13px;
   color: #019477;
 }
 .input-field .input:focus, .input-field .input:valid{
    border-bottom: 1px solid#019477;
 }
 .submit{
    border: none;
    outline: none;
    height: 45px;
    background: #3e3e5f;
    border-radius: 5px;
    transition: .4s;
    margin-top: 15px;
    color:#fff;
 }
 label 
 {
  }
 .submit:hover{
    background:hsl(167, 47%, 22%);
    color: #000;
 }
 .signin{
    text-align: center;
    font-size: small;
    margin-top: 25px;
}
span a{
    text-decoration: none;
    font-weight: 700;
    color: #000;
    transition: .5s;
}
span a:hover{
    text-decoration: underline;
    color: #000;
}

@media only screen and (max-width: 768px){
    .side-image{
        border-radius: 10px 10px 0 0;
    }
    img{
        width: 350px;
        position: absolute;
        top: 20px;
        left: 47%;
    }
    .text{
        position: absolute;
        top: 70%;
        text-align: center;
    }
    .text p, i{
        font-size: 16px;
    }
    .row{
        max-width:420px;
        width: 100%;
    }
}</style>
  
    <form  method="post" class="Login">
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                <div class="hh">       
                <h2>Bienvenu !</h2>
                <h4>Entrez vos information </h4>
                <button>S'inscrire</button>
            </div>
              
                
            </div>

            <div class="col-md-6 right">
                
                <div class="input-box">
                    <img class="img" src="./download__1_-removebg-preview (1).png" alt="">
                   <header>Cree un Compte</header>
                   <div class="input-field">
                       
                                
                            

                        <input    type="text"  name="username"   class="input" id="username" required="" autocomplete="off">

                        <label for="email">Username</label> 
                    </div> 
                   <div class="input-field">
                        <input type="password"    name="password" class="input" id="pass" required="">
                        <label for="pass">Mot de passe</label>
                    </div> 
                   <div class="input-field">
                        
                        <input id=button  type="submit" name="submit" class="submit" value="login">
                        <label for="">Connectez vous</label>
                   </div> 
                   <div class="signin">
                    <span>Vous avez déjà un compte? <a href="registr_ens.php">S'inscrire</a></span>
                   </div>
                </div>  
            </div>
        </div>
    </div>
</div>
</form>
</body>
</html>