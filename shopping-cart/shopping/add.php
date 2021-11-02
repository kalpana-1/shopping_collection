
<?php
    session_start(); 
	
    $id =$_POST["id"];
    $name =$_POST["name"];
    $price =$_POST["price"];
    $qty =$_POST["qty"];

    //db config
    $servername="localhost";
    $username="root";
    $password="";
    $db="shoppingcart";
    
    $conn= mysqli_connect( $servername, $username, $password, $db);
    if(!$conn){
        die("Not connected");
    }
		
    $user= $_SESSION['userid'];
	 
    $sql = "INSERT INTO cart (user_id, item_id, quantity,isActive) VALUES ('$user', '$id', '$qty','1')";	
    $result= mysqli_query($conn, $sql);
    
    if($result){
        header("Location:cart.php");                
    }else{
        header("Location:home.php");  
    }	
?>	
	
	
	

	
	
	