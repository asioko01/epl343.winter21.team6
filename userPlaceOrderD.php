<?php


// Initialize the session
session_start();

$username = $_SESSION["username"];
// Check if the user is already logged in, if yes then redirect him to welcome page 
// Include config file
require_once "config.php";
// Define variables and initialize with empty values
if ($link->connect_error) {
    die('Connect Error (' . 
    $link->connect_errno . ') '. 
    $link->connect_error);
}

$sql = "SELECT * FROM `distribution` WHERE Chain = '$username'";

$result = $link->query($sql); 



$solomos =$mpakaliaros=$kalamari= "";
$solomos_err =$mpakaliaros_err=$kalamari_err= "";
$Solomos_price=0;
$Kalamari_price=0;
$Mpakaliaros_price=0;
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
    if(empty(trim($_POST["Solomos_Quantity"]))){
        $solomos_err = "Please enter Solomos Quantity.";
    } else{
        $solomos = trim($_POST["Solomos_Quantity"]);
    }   
    // Check if password is empty
    if(empty(trim($_POST["Mpakaliaros_Quantity"]))){
        $mpakaliaros_err = "Please enter your Mpakaliaros Quantity.";
    } else{
        $mpakaliaros = trim($_POST["Mpakaliaros_Quantity"]);
    }
    if(empty(trim($_POST["Kalamari_Quantity"]))){
        $kalamari_err = "Please enter Kalamari Quantity.";
    } else{
        $kalamari = trim($_POST["Kalamari_Quantity"]);
    }   
    if(empty($solomos_err) && empty($mpakaliaros_err) && empty($kalamari_err)){
        // Prepare a select statement
        $Solomos_price=$_SESSION["sol"];
        $sql = "INSERT INTO `user_orders`(`FishID`, `FishName`, `price`, `quant`, `status`,`userName`) 
        VALUES (1,'Solomos','$Solomos_price','$solomos',0,'$username')";   
        mysqli_query($link, $sql);
        $Mpakaliaros_price=$_SESSION["mpa"];
        $sql = "INSERT INTO `user_orders`(`FishID`, `FishName`, `price`, `quant`, `status`,`userName`) 
        VALUES (2,'Mpakaliaros','$Mpakaliaros_price','$mpakaliaros',0,'$username')";     
        mysqli_query($link, $sql);

        $Kalamari_price=$_SESSION["kal"];
        $sql = "INSERT INTO `user_orders`(`FishID`, `FishName`, `price`, `quant`, `status`,`userName`) 
        VALUES (3,'Kalamari','$Kalamari_price','$kalamari',0,'$username')";     
        
        mysqli_query($link, $sql);
       }

    
    // Close connection
    mysqli_close($link);
}


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
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 


    <script type="text/javascript">
        function co_back(){
            location.href='userEntryPage.php';
        }
    </script>
    <style>
.anyButton2 {
    width: 100px;
    height: 40px;
    position: absolute;
    background-color: #2691d9;
    top:auto;
    left:93%;
   }  
   .anyButton3 {
    width: 100px;
    height: 40px;
    position: absolute;
    background-color: #2691d9;
    top:auto;
    left:83%;
   }  
    </style>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Add To Cart</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>FISH ID</th>
                <th>FISH NAME</th>
                <th>PRICE/kg</th>
                <th>MAX QUANTITY</th>
                <th>ORDER QUANTITY</th>
            </tr>
        </thead>
        <tbody>
        <?php   // LOOP TILL END OF DATA 
            $rows=$result->fetch_assoc();
        ?>

            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['FishID'];?></td>
                <td><?php echo $rows['FishName'];?></td>
                <td><?php $Solomos_price = $rows['Price']; echo $Solomos_price;?></td>
                <td><?php echo $rows['MaxQuantity'];
                $_SESSION["sol"]=$Solomos_price;
                ?></td>
                <td><input type="input" class="checkLarger" id="Check" name="Solomos_Quantity"></td>
            </tr>
        </tbody>

        <tbody>
        <?php   // LOOP TILL END OF DATA 
            $rows=$result->fetch_assoc()
        ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['FishID'];?></td>
                <td><?php echo $rows['FishName'];?></td>
                <td><?php $Mpakaliaros_price = $rows['Price']; echo $Mpakaliaros_price;
                 $_SESSION["mpa"]=$Mpakaliaros_price;
                ?></td>
                <td><?php echo $rows['MaxQuantity'];?></td>
                <td><input type="input" class="checkLarger" id="Check" name="Mpakaliaros_Quantity"></td>
            </tr>
        </tbody>

        <tbody>
        <?php   // LOOP TILL END OF DATA 
            $rows=$result->fetch_assoc()
        ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['FishID'];?></td>
                <td><?php echo $rows['FishName'];?></td>
                <td><?php $Kalamari_price = $rows['Price']; 
                          echo $Kalamari_price;
                          $_SESSION["kal"]=$Kalamari_price;
                          ?></td>
                <td><?php echo $rows['MaxQuantity'];?></td>
                <td><input type="input" class="checkLarger" id="Check" name="Kalamari_Quantity"></td>
            </tr>
        </tbody>
    </table>
    <br>
    <input type="submit" class="anyButton3" value="Submit"> </button>
    <button type="button" onclick=co_back() class="anyButton2"> Back </button> 
    </form>
</body>
</html>