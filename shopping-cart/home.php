<?php
    session_start();
        
    //echo $_SESSION['username'];
    //echo $_SESSION['userid'];
	
    if(empty($_SESSION["username"])){
	header("Location:login.php");
    }
    //config db
    $servername="localhost";
    $username="root";
    $password="";
    $db="shoppingcart";
    
    $conn= mysqli_connect( $servername, $username, $password, $db);
    
    if(!$conn){
        die("Not connected");
    }
    $sql = "SELECT * from items";
    $result= mysqli_query($conn, $sql);
    
?>


<html>
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
        <style>
            body, html {
                height: 100%;
                font-family: "Inconsolata", sans-serif;
            }
            .bgimg {
                background-position: center;
                background-size: cover;
                background-image: url("example4.jfif");
                min-height: 50%;
            }
            .myapp{
                background-image: url("background3.jfif");    
            }
           
        </style>
    </head>
    <body>
        
        <div class="bgimg w3-display-container w3-opacity-min" >
            <div class="w3-display-middle w3-right w3-padding-small w3-margin w3-card w3-pink w3-opacity-min	">
                <span class="w3-text-aqua w3-padding-64 w3-margin" style="font-size:64px ;  padding-right: 200px;  "> PINK FASHION<br><p class="w3-text-white" style="font-size:50px; " >Hi...  <?php echo $_SESSION['username']; ?> Welcome</span>
            </div>
         </div>
        <?php
         while($row =mysqli_fetch_row($result)) {
        ?>

        <div class="w3-row w3-light-gray " style="width:1500px;height:300px;">
            <div class="w3-col m4 w3-light-gray w3-center w3-padding " style=" margin: 5px;">
                <img src="<?php echo $row[3] ?>" class="w3-borded" alt="bag" style="width:350px; height: 300px">    
            </div>
            <div class="myapp w3-col m6 w3-dark-grey w3-left-align w3-text-black w3-padding-left">
                <div style="padding-left: 50px;" >
                    <h3 class="w3-padding-left" ><b><?php echo $row[1] ?></b></h3>
                    <p><?php echo $row[4] ?></p>    
                </div>
                <div class="myapp w3-col m4 w3-blue w3-center ">
                    <br><br> <br><br>
                    <p class="w3-text-black"><b> <?php echo $row[2] ?> LKR</b></p>
                    <a  class="w3-text-black w3-button w3-large w3-round-xlarge w3-green" href="detail.php?id=<?php echo $row[0]; ?>" >Place an Order</a>
					
                    <br><br> <br><br>
                </div>
            </div>    
        </div>    
         <?php
         }
         mysqli_free_result($result);
    
        mysqli_close($conn);
         ?>        
    </body>
</html>