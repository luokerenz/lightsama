<?php
require_once 'users/init.php';
include 'supplyment/dbAccess.php';
$purpose=$_GET["purpose"];
$name=$_POST["name"];
$email=$_POST["email"];
$message=$_POST["message"];

$query = "SELECT email_login FROM email";
$results = $conn->query($query);
$row=  mysqli_fetch_array($results);
echo $row;

if($purpose=="bug")
{
    $body="someone has a bug to report, here is his find: ".$message." ";
    echo $body;
    
}


echo $purpose;
echo $name;
echo $email;
echo $message;

?>

