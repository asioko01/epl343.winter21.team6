<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page 
// Include config file

$username = $_SESSION["username"];

require_once "config.php";
// Define variables and initialize with empty values
if ($link->connect_error) {
    die('Connect Error (' . 
    $link->connect_errno . ') '. 
    $link->connect_error);
}

$sql = "SELECT * FROM `user_orders` WHERE UserName = '$username'";

$result = $link->query($sql); 



$sql2 = "SELECT SUM(`price` * `quant`) AS Sum FROM `user_orders` WHERE userName = '$username'";

$result2 = $link->query($sql2); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="styleAddChainSuper.css" />
    <link rel="stylesheet" type="text/css" href="styleButton.css" />

    <script type="text/javascript">
        function co_back(){
            location.href='userEntryPage.php';
        }
    </script>
    <style>

    .anyButton2 {
    left:93%;
   }  
    </style>
</head>

<body>
    <h1>ADD TO CART</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>FISH ID</th>
                <th>FISH NAME</th>
                <th>PRICE/kg</th>
                <th>QUANTITY</th>
            </tr>
        </thead>
        <tbody>
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['FishID'];?></td>
                <td><?php echo $rows['FishName'];?></td>
                <td><?php echo $rows['price'];?></td>
                <td><?php echo $rows['quant'];?></td>
            </tr>
            <?php
                }
                ?>               
        </tbody>
            
            </table>     
            

        <table class="styled-table">
            <thead>
                <td>Status</td>
            </thread>
            <tbody>
                <tr>
                    <td> <?php $rows=$result->fetch_assoc();
                        if($rows == NULL)
                            echo '0';
                        else
                            echo $rows['Status'];?></td>
                </tr>
            </tbody>         
         </table>
         <table class="styled-table">     
         <thead>
             <td>Total Cost</td>
         </thread>       
         <tbody>
             <tr>
             <td> <?php $rows=$result2->fetch_assoc(); echo $rows['Sum'];?></td>
             </tr>
         </tbody>
         
      </table>
 
    <br>
    <button type="button" onclick=co_back()  class="anyButton2" > Back </button> 
</body>
</html>