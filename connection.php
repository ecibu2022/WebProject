<?php
$server="localhost";
$user="root";
$password="";
$database="health";

$conn=new mysqli($server, $user, $password, $database);

//Checking if thereis noconnection to the database
if(!$conn){
    echo "Error occured";
}

?>