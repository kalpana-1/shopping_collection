<?php
session_start(); 
if(empty($_SESSION["username"])){
	header("Location:login.php");
}
	
    $user_id=$_SESSION['userid'];
    
    //db config
    $servername="localhost";
    $username="root";
    $password="";
    $db="shoppingcart";
    
    $conn= mysqli_connect( $servername, $username, $password, $db);
    
    if(!$conn){
        die("Not connected");
    }
    $sql1 = "SELECT DISTINCT item_id from cart where user_id='".$user_id."' AND isActive='1' ";
   
    $result1= mysqli_query($conn, $sql1);
    
    //assign value
    $payment=0;
                               
?>

<html>
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
        <style>
            body, html {
                height: 100%;
                font-family: "Inconsolata", sans-serif;
            }
            .bgimg {
                background-position: center;
                background-size: cover;
                background-image: url("example5.jfif");
                min-height: 50%;
            }
            .myapp{
                background-image: url("background3.jpg");
                
            }
           
        </style>
    </head>
    <body> 
        <div class="bgimg w3-display-container w3-opacity-min" >
            <div class="w3-display-right w3-right w3-padding-64 w3-margin-right	">  
                <span class="w3-text-white w3-padding-64 w3-margin-right" style="font-size:60px ; padding-right: 200px;">My Cart<br></span>   
            </div>  
         </div>
        <div class="w3-row w3-light-gray " style="width:1500px;height:300px;">
            
            <div class="myapp w3-col m6 w3-pink w3-left-align w3-text-black w3-padding-left">
                <div style="padding-left: 50px;" >
                    <h2 class="w3-padding-left" ><b>My Cart </b></h2>    
                </div>
                <div class="myapp w3-col m6 w3-blue " style="padding-left:40px;width:1000px;">
                    <br><br> <br><br>
                    
                        <div class="w3-center">
                            <table class="w3-table w3-striped w3-border">
                                <tr>
                                  <th>Item Name</th>
                                  <th>Unit Price</th>
                                  <th>Quantity</th>
                                  <th>Total Amount</th>
                                </tr>
                                <?php
                                     while($row1 =mysqli_fetch_row($result1)) {
                                    $item_id= $row1[0]; 

                                    //select distinct items
                                    $sql2 = "SELECT DISTINCT quantity from cart where item_id='".$item_id."' AND user_id='".$user_id."' AND isActive='1'";
                                    $result2= mysqli_query($conn, $sql2);
                                    $sum=0;
                                    
                                    while($row2 =mysqli_fetch_row($result2)) {
                                        $qty= $row2[0];
                                        $sum= $sum + $qty;            
                                    }

                                    //select details about particular item
                                    $sql3 = "SELECT * from items where id='".$item_id."'";
                                    $result3= mysqli_query($conn, $sql3);
                                    $row3 =mysqli_fetch_row($result3);

                                    $item_name =$row3[1];
                                    $unitprice=$row3[2];
                                    $total_amount = $sum*$unitprice;
                                    
                                    //count total amout customer should pay
                                    $payment =$payment + $total_amount;
                                    
                                ?>
                                
                                <tr>
                                  <td><?php  echo $item_name;    ?></td>
                                  <td><?php  echo $unitprice;    ?></td>
                                  <td><?php  echo $sum;   ?></td>
                                  <td><?php  echo $total_amount;    ?></td>
                                </tr>
                                
                                <?php
                                     $sum =0;
                                    }
                                     mysqli_free_result($result1);    
                                ?>
                              </table>
                        </div> 
                        <br>
			<p><button class="w3-right w3-xlarge w3-btn w3-gray">Total Amount
                        <span class="w3-badge w3-margin-left w3-white">Rs <?php echo $payment; ?></span>
                        </button></p>
                        <?php
                            mysqli_close($conn);
                        ?>
					
                    <br><br> <br><br>
                </div>
            </div>    
        </div>          
    </body>
</html>

