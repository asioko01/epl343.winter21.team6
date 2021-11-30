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
    <link rel="stylesheet" href="style.css">


    <script type="text/javascript">  
          function placeOrder_Redirect()
          {
            location.href = 'userPlaceOrderD.php';
          }
          function orderStatus_Redirect()
          {
            location.href = 'userOrderStatusD.php';
          } 
         </script>   

    <style>
        .placeOrder {
          display: Place Order;
          width: 40%;
          border-color: #0c1650;
          background-color: #3b58fc;
          color: white;
          padding: 14px 14px;
          font-size: 20px;
          cursor: pointer;
          text-align: match-parent;
        }

        .placeOrder {
          margin: 0;
          position: absolute;
          top: 40%;
          -ms-transform: translateY(-50%);
          transform: translateY(-50%);
          left: 50%;
          -ms-transform: translateX(-50%);
          transform: translateX(-50%);
        }
        
        .placeOrder:hover {
          background-color: rgb(6, 194, 241);
          color: black;
        }
        </style>

    <style>
        .orderStatus {
          display: New Stock;
          width: 40%;
          border-color: #0c1650;
          background-color: #3b58fc;
          color: white;
          padding: 14px 14px;
          font-size: 20px;
          cursor: pointer;
          text-align: match-parent;
        }

        .orderStatus {
          margin: 0;
          position: absolute;
          top: 50%;
          -ms-transform: translateY(-50%);
          transform: translateY(-50%);
          left: 50%;
          -ms-transform: translateX(-50%);
          transform: translateX(-50%);
        }
        
        .orderStatus:hover {
          background-color: rgb(6, 194, 241);
          color: black;
        }
        </style>

</head>
<body>
    <button type="button" onclick=placeOrder_Redirect() class="removeCustomer">Place Order</button>
    <button type="button" onclick=orderStatus_Redirect() class="viewCustomer">Order Status</button>
</body>
</html>