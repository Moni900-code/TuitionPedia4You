<?php
if(isset($_POST['submit'])){
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


    $host='localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'register';

    //$conn = new mysqli($host,$user,$pass,$dbname);
    $conn=new mysqli('localhost','root','','register');
    if($conn){
        echo "database connection successful";
    }
    else{
        die("something went wrong");
    }

    // $sql = "INSERT INTO registration(phnnum,pass,cpass,email,fullname,Gender,membertype,university,eduback,department,city,living_place,location) values ('$phnnum','$pass','$cpass','$email','$fullname','$Gender','$membertype','$university','$eduback','$department','$city','$living_place','$location')";
    // mysqli_query($conn,$sql);
}

    //Database connection

    //$q="insert into registration value('$phnnum','$pass','$cpass','$email','$fullname','$Gender','$membertype','$university','$eduback','$department','$city','$living_place','$location')"

    //if(!$conn){
        //die("Connection Failed : " .mysqli_connect_error());
    //}
    //else{
        //$stmt = $conn->prepare("insert into registration(phnnum,pass,cpass,email,fullname,Gender,membertype,university,eduback,department,city,living_place,location)
        //values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        //$stmt->bind_param("issssssssssss",$phnnum,$pass,$cpass,$email,$fullname,$Gender,$membertype,$university,$eduback,$department,$city,$living_place,$location);
        //$stmt->execute();
       // echo "Registration successful";
        //$stmt->close();
        //$conn->close();
   // }
?>