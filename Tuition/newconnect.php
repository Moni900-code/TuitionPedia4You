<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create connection
$conn = new mysqli($phnnum,$pass,$cpass,$email,$fullname,$Gender,$membertype,$university,$eduback,$department,$city,$living_place,$location);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get the form data
    $phnnum=$_POST['phnnum'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $email=$_POST['email'];
    $fullname=$_POST['fullname'];
    $Gender=$_POST['Gender'];
    $membertype=$_POST['membertype'];
    $university=$_POST['university'];
    $eduback=$_POST['eduback'];
    $department=$_POST['department'];
    $city=$_POST['city'];
    $living_place=$_POST['living_place'];
    $location=$_POST['location'];

    // SQL query to insert the data into the database
    $sql = "INSERT INTO registration (phnnum,pass,cpass,email,fullname,Gender,membertype,university,eduback,department,city,living_place,location) VALUES ('$phnnum','$pass','$cpass','$email','$fullname','$Gender','$membertype','$university','$eduback','$department','$city','$living_place','$location')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}