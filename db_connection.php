<?php
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Omonoia16!";
$db = "epl343";


$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

return $conn;
}

function CloseCon($conn)
{
$conn->close();
}

?>