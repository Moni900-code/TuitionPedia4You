<?php 
session_start();

if(isset($_SESSION['fullname'])) {

    include "database.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: t_p2.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: t_p2.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: t_p2.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	// $op = md5($op);
    	// $np = md5($np);
        $fullname = $_SESSION['fullname'];

        $sql = "select * from login where fullname='$fullname' && pass='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
        	
        	$sql_2 = "update login set pass='$np' where fullname='$fullname'";
        	mysqli_query($conn, $sql_2);
        	header("Location: t_p2.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: t_p2.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: t_p2.php");
	exit();
}

}else{
     header("Location: index.php");
     exit();
}