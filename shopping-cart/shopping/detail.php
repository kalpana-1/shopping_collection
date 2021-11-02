<?php
session_start(); 
if(empty($_SESSION["username"])){
	header("Location:login.php");
}
	
	
    $num = $_GET["id"];
    $servername="localhost";
    $username="root";
    $password="";
    $db="shoppingcart";
    
    $conn= mysqli_connect( $servername, $username, $password, $db);
    
    if(!$conn){
        die("Not connected");
    }
    $sql = "SELECT * from items where id='".$num."'";
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
            <div class="w3-display-right w3-right w3-padding-64 w3-margin-right	">
                <span class="w3-text-black w3-padding-64 w3-margin-right" style="font-size:60px ; padding-right: 200px;">Find Out More<br></span>
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
                    <h3 class="w3-padding-left" ><b><?php echo $row[1]; ?></b></h3>
                    <p><?php echo $row[4] ?></p>    
                </div>
                <div class="myapp w3-col m4 w3-blue " style="padding-left:40px">
                    <br><br> <br><br>
                    
					<div class="w3-center">
					<form class="w3-container w3-card-4 w3-light-grey" action="add.php" method="post">
					
						<input type="hidden" class="w3-input w3-border w3-round-xxlarge" name="id" type="text" value="<?php echo $row[0] ?>"><br>
						<label class="w3-left">Name</label>
						<input class="w3-input w3-border w3-round-xxlarge" name="name" type="text" value="<?php echo $row[1] ?>"><br>
						
						<label class="w3-left">Unit Price (LKR)</label>
						<input class="w3-input w3-border w3-round-xxlarge" name="price" type="text" value="<?php echo $row[2]; ?>"><br>
						
						<label class="w3-left">Quantity</label>
						<input class="w3-input w3-border w3-round-xxlarge" name="qty" type="text"><br>
						<button type="submit" class="w3-button w3-large w3-round-xlarge w3-green ">Add To Cart</button>
					</form>
					</div>
					
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