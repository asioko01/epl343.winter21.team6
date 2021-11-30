<?php
use CommonMark\Node\ThematicBreak;
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page 
// Include config file
require_once "config.php";
// Define variables and initialize with empty values

// Checking for connections
if ($link->connect_error) {
    die('Connect Error (' . 
    $link->connect_errno . ') '. 
    $link->connect_error);
}
// Processing form data when form is submitted
 
        // Prepare a select statement
        $sql="SELECT * FROM todays_stock ";

        $result = $link->query($sql); 
    // Close connection
    mysqli_close($link);

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
</head>

<style>
.anyButton {
  top:120%;
  left:93%;
  }
</style>

<body>

  <h1>Today's Orders per Supermarket</h1>
  <table class="styled-table">
    <thead>
    <tr>
      <th>Supermarket</th>
      <th>Total Price</th>
      <th>Fish ID</th>
      <th>Fish Name</th>
      <th>Quantity</th>
    </tr>
  </thead>

  <tbody>
    <tr>
        <td>Sklavenitis</td>
        <td>120€</td>
        <td>1</td>
        <td>Solomos</td>
        <td>100kg</td>
    </tr>
  
    <tr>
      <td>Sklavenitis</td>
      <td>90€</td>
      <td>2</td>
      <td>Mpakaliaros</td>
      <td>20kg</td>
    </tr>
  
  <tr>
    <td>Sklavenitis</td>
    <td>140€</td>
    <td>3</td>
    <td>Tsipoura</td>
    <td>10kg</td>
  </tr>
  
  <tr>
    <td>Sklavenitis</td>
    <td>60€</td>
    <td>4</td>
    <td>Kalamari</td>
    <td>70kg</td>
  </tr>
  
  <tr>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
  
    <tr>
        <td>Alfamega</td>
        <td>70€</td>
        <td>1</td>
        <td>Solomos</td>
        <td>30kg</td>
    </tr>
  
    <tr>
      <td>Alfamega</td>
      <td>100€</td>
      <td>2</td>
      <td>Mpakaliaros</td>
      <td>70kg</td>
    </tr>
  
  <tr>
    <td>Alfamega</td>
    <td>110€</td>
    <td>3</td>
    <td>Tsipoura</td>
    <td>80kg</td>
  </tr>
  
  <tr>
    <td>Alfamega</td>
    <td>60€</td>
    <td>4</td>
    <td>Kalamari</td>
    <td>20kg</td>


  </tbody>
  </table>

  <br>
  <br>

  <h1>Today's Remaining Stock</h1>
<table class="styled-table">
  <thead>
  <tr>
    <th>Fish ID</th>
    <th>Fish Name</th>
    <th>Remaining stock</th>
  </tr>

</thead>
<tbody>
     <!-- PHP CODE TO FETCH DATA FROM ROWS-->
     <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['Fish_id'];?></td>
                <td><?php echo $rows['Fish_name'];?></td>
                <td><?php echo $rows['quant'];?></td>
            </tr>
            <?php
                }
                ?>
                
 

</tbody>
</table>


<button type="submit" class="anyButton"  onclick =Submit() >MENU </button> <br><br>  
    
    <script type="text/javascript">
        function Submit(){
            location.href='Todays_Sales_Interface.html';
        }
    </script>


</body>
</html>