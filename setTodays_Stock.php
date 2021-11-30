<?php

// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page 
// Include config file
require_once "config.php";
// Define variables and initialize with empty values
$solomosQuant=$tsipouraQuant=$mpakaliarosQuant=$kalamariQuant="";
$mpakError=$solError=$tsipError=$kalError=$resError="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  // Check if mpakaliarosQuantity is empty
  if(empty(trim($_POST["mpakaliarosQuantity"]))){
      $mpakError = "Please enter a quantity for Mpakaliaros.";
  } else{
      $mpakaliarosQuant = trim($_POST["mpakaliarosQuantity"]);
  }  
  
  // Check if solomosQuantity is empty
  if(empty(trim($_POST["solomosQuantity"]))){
    $solError = "Please enter a quantity for Solomos.";
} else{
    $solomosQuant = trim($_POST["solomosQuantity"]);
}   

  // Check if tsipouraQuantity is empty
  if(empty(trim($_POST["tsipouraQuantity"]))){
    $tsipError = "Please enter a quantity for Tsipoura.";
} else{
    $tsipouraQuant = trim($_POST["tsipouraQuantity"]);
}   

  // Check if kalamariQuantity is empty
  if(empty(trim($_POST["kalamariQuantity"]))){
    $kalError = "Please enter a quantity for Kalamari.";
} else{
    $kalamariQuant = trim($_POST["kalamariQuantity"]);
}

if (!empty($_POST['1']))
{
// Validate credentials
if(empty($mpakError) && empty($solError) && empty ($tsipError) && empty ($kalError)){
 // Prepare a select statement
 $sql = "INSERT INTO TODAYS_STOCK (Fish_id, Fish_name, quant) 
 VALUES ('1', 'Mpakaliaros', '$mpakaliarosQuant'),
        ('2', 'Solomos', '$solomosQuant'), 
        ('3', 'Tsipoura', '$tsipouraQuant'),
        ('4', 'Kalamari', '$kalamariQuant')";

  if (mysqli_query($link, $sql)) {
            echo '<script>alert("Todays Stock updated")</script>';
        } else {

            echo '<script>alert("Todays Stock is already updated. \nPlease reset Todays Stock and try again")</script>';
		}

   }
  else echo '<script>alert("Please set the quantities for all the fish!")</script>';
}
 
else if (!empty($_POST['2'])) {   

if(empty($resError)){
	$sql = "DELETE
			FROM TODAYS_STOCK";

  if (mysqli_query($link, $sql)) {
            echo '<script>alert("Todays Stock reset")</script>';
        } else {

            echo '<script>alert("Failed to reset Todays Stock")</script>';
		}
	  }

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

    <script type="text/javascript">  
          function redirectBack()
          {
            location.href = 'Todays_Sales_Interface.html';
          }
          </script>
<style>
    table, th, td {
      border:1px solid black;
    }
table {
    table-layout: fixed ;
    width: 100% ;
  }
  td {
    width: 25% ;
  }

  tr{
    height: 30px;
  }
  .anyButton2 {
  top:auto;
  left:73%;
  width: 100px;
  height: 40px;
  position: absolute;
  background-color: #2691d9;
}

  .anyButton3 {
  top:auto;
  left:83%;
  width: 100px;
  height: 40px;
  position: absolute;
  background-color: #2691d9;
}
.anyButton4 {
  top:auto;
  left:93%;
  width: 100px;
  height: 40px;
  position: absolute;
  background-color: #2691d9;
}
</style>

</head>

<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<h1>Today's Total Stock</h1>

<table class="styled-table">
  <thead>
  <tr>
    <th>Fish ID</th>
    <th>Fish Name</th>
    <th>Set Total</th>
  </tr>
</thead>

<tbody>
  <tr>
      <td>1</td>
      <td>Solomos</td>
      <td><input style="width:98.5%;font-size:14pt;" type="text" name="solomosQuantity"></td>
  </tr>

  <tr>
    <td>2</td>
    <td>Mpakaliaros</td>
    <td><input style="width:98.5%;font-size:14pt;" type="text" name="mpakaliarosQuantity"></td>
</tr>

<tr>
    <td>3</td>
    <td>Tsipoura</td>
    <td><input style="width:98.5%;font-size:14pt;" type="text" name="tsipouraQuantity"></td>
</tr>

<tr>
    <td>4</td>
    <td>Kalamari</td>
    <td><input style="width:98.5%;font-size:14pt;" type="text" name="kalamariQuantity"></td>
</tr>
</tbody>
</table>


<br>
<br>


<table class="styled-table">
  <thead>
  <tr>
    <th>Market Chain</th>
    <th>Fish ID</th>
    <th>Fish Name</th>
    <th>Set Total</th>
  </tr>
</thead>

<tbody>
  <tr>
      <td>Sklavenitis</td>
      <td>1</td>
      <td>Solomos</td>
      <td><input style="width:98.5%;font-size:14pt;" type="text" id="Quantity"></td>
  </tr>

  <tr>
    <td>Sklavenitis</td>
    <td>2</td>
    <td>Mpakaliaros</td>
    <td><input style="width:98.5%;font-size:14pt;" type="text" id="Quantity"></td>
  </tr>

<tr>
     <td>Sklavenitis</td>
    <td>3</td>
    <td>Tsipoura</td>
    <td><input style="width:98.5%;font-size:14pt;" type="text" id="Quantity"></td>
</tr>

<tr>
    <td>Sklavenitis</td>
    <td>4</td>
    <td>Kalamari</td>
    <td><input style="width:98.5%;font-size:14pt;" type="text" id="Quantity"></td>
</tr>

<tr>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
</tr>

<tr>
  <td>Alfamega</td>
  <td>1</td>
  <td>Solomos</td>
  <td><input style="width:98.5%;font-size:14pt;" type="text" id="Quantity"></td>
</tr>

<tr>
<td>Alfamega</td>
<td>2</td>
<td>Mpakaliaros</td>
<td><input style="width:98.5%;font-size:14pt;" type="text" id="Quantity"></td>
</tr>

<tr>
<td>Alfamega</td>
<td>3</td>
<td>Tsipoura</td>
<td><input style="width:98.5%;font-size:14pt;" type="text" id="Quantity"></td>
</tr>

<tr>
<td>Alfamega</td>
<td>4</td>
<td>Kalamari</td>
<td><input style="width:98.5%;font-size:14pt;" type="text" id="Quantity"></td>
</tr>
</tbody>
</table>


<button type="submit" class="anyButton2"  name="1" value="1"> Set Today's Stock </button> 

<button type="submit" class="anyButton3"  name="2" value="2"> Reset Today's Stock </button> 

<button type="button" class = "anyButton4" onclick=redirectBack() class="Go_Back">Back </button>
<br><br><br><br>





</body>
</html>