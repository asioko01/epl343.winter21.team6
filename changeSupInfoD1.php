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
$sup=$sup_err="";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
    if(empty(trim($_POST["sup"]))){
        $sup_err = "Please enter supermarket to edit.";
    } else{
        $sup = trim($_POST["sup"]);
    }
    
    if(!empty($sup) ){
        $sql1 = "SELECT userName, password,type,address,telephone,city,chain FROM users WHERE userName = '.$sup'";
        
        $result1 = $link->query($sql1); 
        if($result1==NULL){
            echo"wrong supermarket";
        }
        else{
           
           $_SESSION['supToEdit']=$sup;
           header("location: changeSupInfoD2.php");
        }
     }
}
// Processing form data when form is submitted
 
        // Prepare a select statement
        $sql="SELECT * FROM users WHERE type=1 ";
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
</head>

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


<body>
    <h1>Edit Supermarket </h1>
        <!-- TABLE CONSTRUCTION-->
        <table class="styled-table">
            <thead>
            <tr>
             <th> Username </th>
             <th>Password </th>
             <th>Type</th>
             <th>Address</th>
             <th>Telephone</th>
             <th>City</th>
             <th>Chain</th>
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
                <td><?php echo $rows['userName'];?></td>
                <td><?php echo $rows['password'];?></td>
                <td><?php echo $rows['type'];?></td>
                <td><?php echo $rows['address'];?></td>
                <td><?php echo $rows['telephone'];?></td>
                <td><?php echo $rows['city'];?></td>
                <td><?php echo $rows['chain'];?></td>
            </tr>
            <?php
                }
            ?>
            </tbody>
    </table>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group">
        <label>Supermarket to Edit</label>
        <input type="text" name="sup" class="form-control <?php echo (!empty($sup_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sup; ?>">
        <span class="invalid-feedback"><?php echo $sup_err; ?></span> 
    </div> 
    <br></br>
    <button type="button"  onclick =customerManagementRedirect()  class="anyButton2" > MENU </button> 
    <button type="submit" class="anyButton3" > Next </button> <br><br>  

    <script type="text/javascript">
        function customerManagementRedirect(){
            location.href='menuCustomers.html';
        }
    </script>

    </form>
</body>
</html>