<?php
use CommonMark\Node\ThematicBreak;
session_start();
require_once "config.php";
if ($link->connect_error) {
    die('Connect Error (' . 
    $link->connect_errno . ') '. 
    $link->connect_error);
}
$sup=$_SESSION['supToEdit'];
# alfamega_skarinou

$sup = mysqli_real_escape_string($link,$sup); // escape string before passing it to query.

$sql1 = "SELECT userName, password,address,telephone,city,chain FROM users WHERE userName = '".$sup."'";

$result1 = $link->query($sql1); 
if( $result1 -> num_rows==0)
   echo("   nullllllll");

else{
   #$row = $result1->fetch_row;
   $row=mysqli_fetch_assoc($result1);
   #print_r($row);
}
$userName=$row["userName"];
$password=$row["password"];
$address=$row["address"];
$phone=$row["telephone"];
$city=$row["city"];
$chain=$row["chain"];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userName1=$_POST["userName"];
    $password1=$_POST["password"];
    $address1=$_POST["address"];
    $phone1=$_POST["phone"];
    $city1=$_POST["city"];
    $chain1=$_POST["chain"];
    // Check if username is empty    
    if(!empty($userName1)&& !empty($password1) && !empty($address1)&&!empty($phone1)&&!empty($chain1) ){
        $chain1 = mysqli_real_escape_string($link,$chain1); // escape string before passing it to query.
        $sql2 = "SELECT userName FROM users WHERE chain = '".$chain1."'";       
        $result2 = $link->query($sql2); 
        if($result2 -> num_rows==0){
            echo"This chain does not exist";
        }
        else{
           $sup = mysqli_real_escape_string($link,$sup); // escape string before passing it to query.
           $sql3 = "UPDATE users SET userName='".$userName1."' , password='".$password1."', address='".$address1."',
           telephone='".$phone1."', city='".$city1."',chain='".$chain1."' WHERE userName='".$sup."' ";
           #$result3 = $link->query($sql3); 

           $result3 =mysqli_query($link,$sql3);
             if($result3==NULL){
                echo '<script type="text/javascript">';
                echo ' alert("NOT Updated Correctly!")';  
                echo '</script>';
            }
            else{
                echo '<script type="text/javascript">';
                echo ' alert("Updated Correctly!")'; 
                echo '</script>';  
                header("location: menuCustomers.html");      
            }
        }
     }
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
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="styleMenuCust.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
</head>

<style>
.addChainSupermarket {
 top:auto;
 left:auto;
}
.customerManagementRedirect {
 top:auto;
 left:auto;
}


</style>
<body>

<div class="center">
<?php



// Processing form data when form is submitted
    $sql="SELECT * FROM users WHERE type=1 ";
    $result = $link->query($sql); 
    // Close connection
    mysqli_close($link);

    echo '<form method="post">';
    echo '<h1>Edit Supermarket</h1><br></br>';
    
    echo '<div class="form-group">';
    echo 'UserName: <input type="text"  name="userName" value="' . $userName . '"></button>';
    echo'</div>';
    echo '<div class="form-group">';
    echo 'Password: <input type="password"  name="password" value="' . $password . '"></button>';
    echo'</div>';
    echo '<div class="form-group">';
    echo 'Address: <input type="text"  name="address" value="' . $address . '"></button>';
    echo'</div>';
    echo '<div class="form-group">';
    echo 'Telephone: <input type="numeric"  name="phone" value="' . $phone . '"></button>';
    echo'</div>';
    echo '<div class="form-group">';
    echo '<label for="city">City</label>
                <select name="city"  value = "' . $city . '">
                <option value="nicosia">Nicosia</option>
                <option value="limassol">Limassol</option>
                <option value="pafos">Pafos</option>
                <option value="larnaka">Larnaca</option>
                <option value="ammoxostos">Ammoxostos</option>
                <option value="keryneia">Keryneia</option>
                </select>';
    echo'</div>'; 
    echo '<div class="form-group">';            
    echo 'Chain: <input type="text"  name="chain" value="' . $chain . '"></button>';
    echo'</div>'; 
    echo '<div class="form-group">';
    echo '<input type="submit"class="btn btn-primary" name="Update" value="Update"></button>';
    echo'</div>';
    echo '<div class="form-group">';
    echo '<input type="submit" class="btn btn-primary" value="Menu" formaction="menuCustomers.html">';
    echo'</div>';
    echo '</form>';

?>
</body>
</html>


