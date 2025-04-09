<?php
$servername="localhost";
$username="root";
$password="";
$database_name="Register";
$conn=mysqli_connect($server_name,$username,$database_name);

if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
}
if(isset($_POST["save"]))
{
    $Full_name = $_POST('Full_name');
    
}