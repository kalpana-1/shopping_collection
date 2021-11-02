 <?php
    session_start();
       $username_error="";
       $password_error="";
       
       if($_SERVER["REQUEST_METHOD"]=="POST"){
           
           //validation part
           $username=$_POST["username"];
           $username_error=validateName($username);
           
           $password=$_POST["password"];
           $password_error=validatePassword($password);
          
           //if haven;t errors continue
           if(empty($username_error) && empty($password_error)){
               
               //database config
               $servername ="localhost";
               $username2="root";
               $password2="";
               $dbname ="shoppingcart";

               $conn = mysqli_connect($servername,$username2,$password2,$dbname);
               if(!$conn){
                   die("connection failed");
               }
               
               $sql = "SELECT * FROM users WHERE name='".$username."' AND password='".$password."'";
               $result =mysqli_query($conn,$sql);
               $row =mysqli_fetch_array($result);
               
               if($row > 1){
                    header("Location:home.php");
                    //passing sessions
                    $_SESSION['username']=$username;
                    $_SESSION['userid']=$row['id'];
               }else{
                    header("Location:login.php");   
               }

           }
       }
       
       //validation functions
       function validateName($username){
          if(empty($username)){
            return "Please enter username";
          } 
       }
       
       function validatePassword($password){
           if(empty($password)){
            return "Please enter password";
           }
       }  
  ?>
<!DOCTYPE html>

<html>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">

    <style>

    body, html {

        height: 100%;
        font-family: "Inconsolata", sans-serif;

    }

    .bgimg {

        background-position: center;
        background-size: cover;
        background-image: url("example1.jpg");
        min-height: 75%;

    }

    .menu {

        display: none;

    }

    </style>

<body>
    
<!-- Header with image -->
<div class="bgimg w3-display-container w3-grayscale-min" id="home" style="height:800px">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
  </div>
  <div class="w3-display-middle w3-center w3-gray" style="width:500px;">
      
    <!--login form -->  
    <form class="w3-container w3-card-4 w3-light-grey" action="" method="post">
        <div class="w3-container w3-green">
            <h2> Login Here</h2>
         </div>
        
        <label class="w3-left">Username</label>
        <input class="w3-input w3-border w3-round-xxlarge" name="username" type="text">
        <p class="w3-text-red w3-left"><?php echo $username_error  ?></p>
        <br>
        <label class="w3-left">Password</label>
        <input class="w3-input w3-border w3-round-xxlarge" name="password" type="password">
        <p class="w3-text-red w3-left"><?php echo $password_error  ?></p>
         <div  class="w3-row">
              <button  type="submit" class="w3-btn w3-round-xxlarge w3-green">Login</button>
              <button type="reset" class="w3-btn w3-round-xxlarge w3-red">Cancel</button>
        </div>
    </form>
     <p> Not registered..?<a href="register.php"> Register Now </a></p>
  </div>

  <div class="w3-display-bottomright w3-center w3-padding-large">
  </div>
</div>
</body>
