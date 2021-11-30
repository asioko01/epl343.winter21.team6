<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page 
// Include config file
require_once "config.php";
// Define variables and initialize with empty values
$address =$city=$chain=$username=$password = "";
$telephone=0;
$address_err =$city_err=$chain_err=$userName_err=$password_err=$telephone_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }   
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter address.";
    } else{
        $address = trim($_POST["address"]);
    }   
    // Check if password is empty
    if(empty(trim($_POST["city"]))){
        $city_err = "Please enter your city.";
    } else{
        $city = trim($_POST["city"]);
    }

    if(empty(trim($_POST["chain"]))){
        $chain_err = "Please enter chain.";
    } else{
        $chain = trim($_POST["chain"]);
    }   
    // Check if password is empty
    if(empty(trim($_POST["telephone"]))){
        $telephone_err = "Please enter your telephone.";
    } else{
        $telephone = trim($_POST["telephone"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err) && empty($address_err)
       && empty($telephone_err) && empty($chain_err) && empty($city_err) ){
        // Prepare a select statement
        $sql = "INSERT INTO users (userName ,password, type, address ,telephone, city , chain) 
        VALUES ('$username', '$password', '1', '$address', '$telephone', '$city', '$chain') ";     
        if (mysqli_query($link, $sql)) {
            echo '<script>alert("New record added")</script>';
        } else {

            echo '<script>alert("This username already exists")</script>';

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
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="styleMenuCust.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
</head>

<style>
.addChainSupermarket {
 top:83%;
 left:auto;
}
.customerManagementRedirect {
 top:auto;
 left:auto;
}


</style>


<body>

<div class="center">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h1>Add Supermarket </h1>
    <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control <?php echo (!empty($userName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
    <span class="invalid-feedback"><?php echo $userName_err; ?></span> 
    </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
    <span class="invalid-feedback"><?php echo $password_err; ?></span>
     </div>
     <div class="form-group">
    <label>Chain</label>
    <input type="text" name="chain" class="form-control <?php echo (!empty($chain_err)) ? 'is-invalid' : ''; ?>">
    <span class="invalid-feedback"><?php echo $chain_err; ?></span> 
    </div>
    <div class="form-group">
    <label for="city">City :</label><br>
    <select name="city" id="city" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>">     
        <option value="nicosia">Nicosia</option>
        <option value="limassol">Limassol</option>
        <option value="pafos">Pafos</option>
        <option value="larnaka">Larnaca</option>
        <option value="ammoxostos">Ammoxostos</option>
        <option value="keryneia">Keryneia</option>
    </select>
    <span class="invalid-feedback"><?php echo $city_err; ?></span>
    </div>
    <div class="form-group">
    <label>Address</label>
    <input type="text" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>">
    <span class="invalid-feedback"><?php echo $address_err; ?></span>
    </div>
    <div class="form-group">
    <label>Telephone</label>
    <input type="text" name="telephone" class="form-control <?php echo (!empty($telephone_err)) ? 'is-invalid' : ''; ?>">
    <span class="invalid-feedback"><?php echo $telephone_err; ?></span>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Confirm process"  >
    </div>
    <div class="form-group">
    <button type="button" class="btn btn-primary"  onclick=customerManagementRedirect()  > Back to Customer Menu </button> 
    </div>
</form>      
</div>

<script type="text/javascript">
   
    function customerManagementRedirect(){
        location.href='menuCustomers.html';
    }
   
</script>  
</body>
</html>