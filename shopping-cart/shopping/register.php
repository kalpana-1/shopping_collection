<?php

//define errors
$name_error ="";
$password_error="";
$address_error ="";
$telephone_error="";
$email_error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $password=$_POST["password"];
    $address=$_POST["address"];
    $telephone=$_POST["telephone"];
    $email=$_POST["email"];
    
    //validation part
    $name_error= validateName($name);
    $password_error= validatePassword($password);
    $address_error= validateAddress($address);
    $telephone_error= validateTelephone($telephone);
    $email_error= validateEmail($email);  
    
    //continue if there is no error
    if(empty($name_error) && empty($password_error) && empty($address_error) && empty($telephone_error) && empty($email_error)){
    
        $servername = "localhost";
        $username = "root";
        $password2 = "";
        $dbname = "shoppingcart";
    
        //db config
        $conn = mysqli_connect($servername, $username, $password2, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        $sql0 ="SELECT * FROM users where name ='".$name."'";
        $result0 = mysqli_query($conn,$sql0);
        $row0 =mysqli_fetch_array($result0);
        
        //inserting data
        if($row0 == 0){
            $sql = "INSERT INTO users (name, password, address,telephone,email) VALUES ('$name', '$password', '$address','$telephone','$email')";
            
                if (mysqli_query($conn, $sql)) {
                    header("Location: login.php");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            
                mysqli_close($conn);
        }else{
            
            //error message
            echo "<script type='text/javascript'>alert('Username is already exist please try with another names');
            window.location='register.php';
            </script>";  
        }    
    }
}

//error functions
function validateName($name){
    if(empty($name)){
        return "Please enter name"; 
    }
}

function validatePassword($password){
    if(empty($password)){
        return "Please enter password"; 
    }
}

function validateAddress($address){
    if(empty($address)){
        return "Please enter address"; 
    }
}

function validateTelephone($telephone){
    if(empty($telephone)){
        return "Please enter contact number"; 
    }
}

function validateEmail($email){
    if(empty($email)){
        return "Please enter email"; 
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
<div class="bgimg w3-display-container w3-grayscale-min" id="home" style="height:1000px">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
  </div>
  <div class="w3-display-middle w3-center" style="width:500px">
      
    <!-- registration page -->  
    <form class="w3-container w3-card-4 w3-light-grey" action="" method="post">
        <div class="w3-container w3-green">
            <h2>Register Here</h2>
         </div>
        
        <label class="w3-left">Name</label>
        <input class="w3-input w3-border w3-round-xxlarge" name="name" type="text">
        <p class="w3-left w3-text-red"><?php echo $name_error   ?>  </p><br><br><br>
         
        <label class="w3-left">Password</label>
        <input class="w3-input w3-border w3-round-xxlarge" name="password" type="password"></p>
        <p class="w3-left w3-text-red"><?php echo $password_error   ?>  </p><br><br><br>
         
        <label class="w3-left">Address</label>
        <input class="w3-input w3-border w3-round-xxlarge" name="address" type="text"></p>
        <p class="w3-left w3-text-red"><?php echo $address_error   ?>  </p><br><br><br>
         
        <label class="w3-left">Telephone</label>
        <input class="w3-input w3-border w3-round-xxlarge" name="telephone" type="text"></p>
        <p class="w3-left w3-text-red"><?php echo $telephone_error   ?> </p><br><br><br>
       
        <label class="w3-left">Email</label>
        <input class="w3-input w3-border w3-round-xxlarge" name="email" type="email"></p>
        <p class="w3-left w3-text-red"><?php echo $email_error   ?>  </p><br><br><br>
        
         <div  class="w3-row">
              <button type="submit" class="w3-btn w3-round-xxlarge w3-green">Register</button>
              <button type="reset" class="w3-btn w3-round-xxlarge w3-red">Cancel</button>
        </div>   
    </form>
       
  </div>

  <div class="w3-display-bottomright w3-center w3-padding-large">
  </div>
</div>
</body>

