<?php

  session_start();
  $se = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styleMenuCust.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />

    <script type="text/javascript">  
        function todaysSales()
        {
          location.href = 'Todays_Sales_Interface.html';
        }
        
        function defineOrderStatus
        ()
        {
          location.href = 'Define_Order_Status_Interface.html';
        }
        function manageCustomers()
        {
          location.href = 'menuCustomers.html';
        }
        
        function ordersHistory()
        {
          location.href = 'view_history.html';
        }  
        function truckManagement()
        {
        location.href = 'ak_truck_menu.html';
        }
       </script>  

        


    
</head>
<body>
   <button type="button" onclick=todaysSales() class="addCustomer"  >TODAY'S SALES</button> 
   <button type="button" onclick=defineOrderStatus() class="editCustomer">DEFINE ORDER STATUS</button>
   <button type="button" onclick=manageCustomers() class="removeCustomer"  >MANAGE CUSTOMERS</button> 
   <button type="button" onclick=ordersHistory() class="viewCustomer">ORDER HISTORY</button>
   <button type="button" onclick=truckManagement() class="trucks">TRUCK MANAGEMENT</button>
    
</body>
</html>