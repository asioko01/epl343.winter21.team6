
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
        $sql="SELECT * FROM users WHERE type=1 ";   
        //$sql = "INSERT INTO users (userName ,password, type, address ,telephone, city , chain) 
        //VALUES ('$username', '$password', '1', '$address', '$telephone', '$city', '$chain') ";    
        $result = $link->query($sql); 

?>
 
<?php
        //session_start();
        require_once "config.php";
        $deleteSup="";
        $deleteSup_err="";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Check if username is empty
            if(empty(trim($_POST["deleteSup"]))){
                $deleteSup_err = "Please enter supermarket to delete.";

            } else{
                $deleteSup = trim($_POST["deleteSup"]);
            }     
            if(empty($deleteSup_err) ){
              $sql = "DELETE FROM users WHERE userName='$deleteSup'";
              if (mysqli_query($link, $sql)) {
                echo '<script>alert("Record deleted successfully")</script>';
                header("Location: menuCustomers.html");
                exit();
            } else {
                echo '<script>alert("This username cant be deleted")</script>';
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
</head>
<style>
    .anyButton{
        top:40%;
        left:93%;  
    }
    
</style>
<style>
    .anyButton2 {
    width: 100px;
    height: 40px;
    position: absolute;
    background-color: #2691d9;
   }  
    .anyButton2{
        top:50%;
        left:93%;  
    }
</style>
<body>
    <h2>Delete a supermarket </h2><br>
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

    <label>Add supermarket username </label>
    <input type="text" name="deleteSup" class="form-control <?php echo (!empty($deleteSup_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $deleteSup; ?>">
    <span class="invalid-feedback"><?php echo $deleteSup_err; ?></span> 

    <button type="button"  onclick =customerManagementRedirect()  class="anyButton2" > MENU </button> <br><br> 
    <button type="submit" class="anyButton"  > Next </button> <br><br>  

    <script type="text/javascript">
        function customerManagementRedirect(){
            location.href='menuCustomers.html';
        }
    </script>

    </form>


    

</body>
</html>