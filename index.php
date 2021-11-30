<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page 
// Include config file
require_once "config.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
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
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT userName, password,type FROM users WHERE userName = ?";     
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);    
            // Set parameters
            $param_username = $username;    
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);             
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $pass,$type);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password==$pass){
                            if($type==0){
                                // Password is correct, so start a new session
                                session_start();    
                            // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["username"] = $username;                            
                            // Redirect user to welcome page
                                header("location: AdminEntryPage.php");
                            }
                            else{
                                    // Password is correct, so start a new session
                                    session_start();    
                                // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["username"] = $username;                            
                                // Redirect user to welcome page

                                    header("location: UserEntryPage.php");
                            }
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid password.";
                        }                    
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username .";
                }
            }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }   
    // Close connection
    mysqli_close($link);
}
?>
 

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="styleMenuCust.css" />   
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <style>
    .addCustomer{
        width:200px;
        height:60px;
        top:100%;
        left:50%;
    }
    </style>
    </head>
    <body>
        <div class="center">
            <h1>Login</h1>
            <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span> 
                </div>    
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
    </body>
</html>