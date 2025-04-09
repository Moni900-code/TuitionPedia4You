<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>login for teachers and tutors</title>
        <link rel="stylesheet" href="login.css" type="text/css">
        <link href="https://fonts.googleapis.com/css2?
        family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
        <link  href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
        <?php
        if (isset($_POST["Login"])) {
           $fullname = $_POST["fullname"];
           $pass = $_POST["pass"];
           $usertype = $_POST["usertype"];
            require_once "database.php";
            $sql="select * from login where fullname='$fullname' && pass='$pass' && usertype='$usertype'";
            //$sql = SELECT * FROM login WHERE fullname = '$fullname' && pass='$pass';
            $result = mysqli_query($conn, $sql);
            //$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
              $num=mysqli_num_rows($result);
              if(mysqli_num_rows($result) > 0){

                $row = mysqli_fetch_array($result);
          
                if($row['usertype'] == 'admin'){
          
                  // $_SESSION['admin_name'] = $row['name'];
                   header('location:home.html');
          
                }
                if($row['usertype'] == 'Tutor'){
          
                   $_SESSION['fullname'] = $row['fullname'];
                   header('location: tutorprofile.php');
          
                }
               
             } //echo "<div class='alert alert-success'></div>";
                    
             else{
                            
                  echo "<div class='alert alert-danger'>something went wrong</div>";
            
                 }
    
                }
        
        ?>
        <form action="login.php" method="POST">

        <div class="navbar">
             <img src="D.jpg" class="tuitionpedia">
             <nav>
                 <ul>
                     <li><a href="home.html">HOMEPAGE</a></li>
                     
                 </ul>
             </nav>
             
         </div>  
          <h1>Login Here</h1>
    <div class="loginbox">
        <img src="1.jpg" class="box">
      
        <form>
            <div class="row">
                 <div class="col">
                 <p>Username</p>
            <input type="text" name="fullname" placeholder="Enter username">
            </div>
           
            <div class="col">
                <p>Password</p>
            <input type="password" placeholder="Enter password" name="pass">
            </div>
            <div class="col">
                <p>Select User Type: </p>
            <br>
            
            <select name="usertype">
                <option value="usertype">Select User type</option>
                <option value="tutor">Tutor</option>
                <option value="admin">Admin</option>
          </select>
          <br><br><br>
            </div>
            
            <input type="submit" value="Login" name="Login" href="tutorprofile.html">
            
            <a href="forgetP.html">Forgot Password?</a><br>
            <a href="Registration.php">Don't have any account?</a>
        </form>
            </div>
           
    </div>
        </form>
    </div>
    </body>
</html>