<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration for teachers and tutors</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="style1.css">
        <link href="https://fonts.googleapis.com/css2?
        family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet"> -->
        
        <link  href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" rel="stylesheet">
    </head>
    <body> 
    <div class="container">
    <?php
        if (isset($_POST["submit"])) {
            $phnnum=$_POST["phnnum"];
           $fullname = $_POST["fullname"];
           $email = $_POST["email"];
           $pass = $_POST["pass"];
           $cpass = $_POST["cpass"];
           $Gender=$_POST["Gender"];
           $membertype = $_POST["membertype"];
           $university= $_POST["university"];
           $eduback = $_POST["eduback"];
           $department=$_POST["department"];
           $city=$_POST["city"];
           $living_place=$_POST["living_place"];
           $lcation=$_POST["lcation"];
           $usertype=$_POST["usertype"];

           $passwordHash = password_hash($pass, PASSWORD_DEFAULT);

           $errors = array();
           
        //    if (empty($username) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
        //     array_push($errors,"All fields are required");
        //    }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
        //    if (strlen($password)<8) {
        //     array_push($errors,"Password must be at least 8 charactes long");
        //    }
           if ($pass!==$cpass) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM login WHERE fullname = '$fullname'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"User already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>"; 
            }
           }else{
            
            $sql = "INSERT INTO login (phnnum, fullname, email, pass, membertype, Gender, university, eduback, department, city, living_place, lcation, usertype) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"issssssssssss",$phnnum,$fullname, $email, $pass,$membertype,$Gender,$university,$eduback,$department,$city,$living_place,$lcation,$usertype);
                mysqli_stmt_execute($stmt);
                //echo "<div class='alert alert-success'>You are registered successfully.</div>";
                echo header('location:login.php');
            }else{
                die("Something went wrong");
            }
           }
        }
        ?>
<!-- ----------------------------------------------------------- -->

    <form action="Registration.php" method="POST">
        <div class="container">
        
            <div class="navbar">
                 <img src="D.jpg" class="tuitionpedia">
                 <nav>
                     <ul>
                         <li><a href="home.php">HOMEPAGE</a></li>
                         <a href="login.php">          
                            <button type="button" class="btnlogin">LOGIN</button>
                        </a>
                     </ul>
                 </nav>
                 
             </div> 
             <h2>Registration Here</h2> 
            
            <div class="register">
                <div class="scrollbox">
                
                    <div class="scrollbox-inner">
                            <input type="radio" name="i am tutor" 
                            id="tutor" >
                            &nbsp;
                            <span id="tutor">I am Tutor</span>
                            <br><br>
                            <label>Type your phone number:</label>
                            <br>
                            <input type="text" name="phnnum"
                            id="phoneno" placeholder="Your phone no" required>
                            <br><br>
                            <label>Type your full name: </label><br>
                            <input type="text" name="fullname" id="fullname" placeholder="Full Name">
                            <br><br>
                            <label>Type your email address(optional): </label><br>
                            <input type="text" name="email" id="email" placeholder="Type your email">
                            <br><br>
                            <label>Give a password for futher use: </label>
                            <br>
                            <input type="password" name="pass" 
                            id="password" placeholder="Password">
                            <br><br>

                            <label>Confirm Password(same as above): </label><br>
                            <input type="password" name="cpass" id="cpass" placeholder="Password">
                            <br><br>
                            
                            <label>Select Gender: </label>
                            <br>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="Gender" id="male" value="male">
                            &nbsp;
                            <span id="male">Male</span>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="Gender" id="female" value="female">
                            &nbsp;
                            <span id="female">Female</span>
                            <br><br>

                            <br>
                            <label>Member type: </label>
                            <br>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="membertype" 
                            id="paid" value="paid">
                            &nbsp;
                            <span id="paid">Paid</span>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="membertype" 
                            id="free" value="free">
                            &nbsp;
                            <span id="free">Free</span>
                            <br><br>
                            <label>Select User type</label>
                        <br>
                <select id="usertype" name="usertype">
                    <option value="usertype">Select User type</option>
                    <option name="admin">Admin</option>
                    <option name="tutor">Tutor</option>
              </select>      
              <br><br> 
                            <label>University: </label>
                    <br>
                    <select id="university" name="university">
                        <option value="university">Select University</option>
                        <option value="Dhaka University(DU)">Dhaka University(DU)</option>
                        <option value="Jagannath University(JnU)">Jagannath University(JnU)</option>
                        <option value="Jahangirnagar University(JU)">Jahangirnagar University(JU)</option>
                        <option value="Dhaka Medical College(DMC)">Dhaka Medical College(DMC)</option>
                        <option value="Sir Salimullah Medical College(SSMC">Sir Salimullah Medical College(SSMC)</option>
                        <option value="Shaheed Suhrawardy Medical college(ShSMC)">Shaheed Suhrawardy Medical college(ShSMC)</option>
                        <option value="Bangladesh University of Engineering and Technology(BUET)">Bangladesh University of Engineering and Technology(BUET)</option>
                        <option value="Ahsanullah Univrsity of Science and Technology(AUST)">Ahsanullah Univrsity of Science and Technology(AUST)</option>
                        <option value="Brac University(BU)">Brac University(BU)</option>
                        <option value="North South University(NSU)">North South University(NSU)</option>
                        <option value="University of Chittagong(CU)"> University of Chittagong(CU)</option>
                        <option value="Chittagong University of Engineering and Technology(CUET)">Chittagong University of Engineering and Technology(CUET)</option>
                        <option value="Chittagong Veterinary and Animal Science University(CVASU)">Chittagong Veterinary and Animal Science University(CVASU)</option>
                        <option value="Chittagong Medical College(CMC)">Chittagong Medical College(CMC)</option>
                        <option value="Khulna University(KU)">Khulna University(KU)</option>
                        <option value="Islamic University">Islamic University</option>
                        <option value="National University">National University</option>
                        <option value="Bangabandhu Sheikh Mujib Medical Universit">Bangabandhu Sheikh Mujib Medical University</option>
                        <option value="Bangabandhu Sheikh Mujibur Rahman Agricultural University">Bangabandhu Sheikh Mujibur Rahman Agricultural University</option>
                        <option value="Hajee Mohammad Danesh Science & Technology University">Hajee Mohammad Danesh Science & Technology University</option>
                        <option value="Mawlana Bhashani Science & Technology University">Mawlana Bhashani Science & Technology University</option>
                        <option value="Patuakhali Science And Technology University">Patuakhali Science And Technology University</option>
                        <option value="Sher-e-Bangla Agricultural University">Sher-e-Bangla Agricultural University</option>
                        <option value="Rajshahi University of Engineering & Technology">Rajshahi University of Engineering & Technology</option>
                        <option value="Khulna University of Engineering & Technology">Khulna University of Engineering & Technology</option>
                        <option value="Dhaka University of Engineering & Technology">Dhaka University of Engineering & Technology</option>
                        <option value="Noakhali Science & Technology University">Noakhali Science & Technology University</option>
                        <option value="Comilla University">Comilla University</option>
                        <option value="Sylhet Agricultural University">Sylhet Agricultural University</option>
                        <option value="Jessore University of Science & Technology">Jessore University of Science & Technology</option>
                        <option value="Pabna University of Science and Technology">Pabna University of Science and Technology</option>
                        <option value="Bangladesh University of Professionals">Bangladesh University of Professionals</option>
                        <option value="University of Barishal">University of Barishal</option>
                        <option value="Rajshahi Medical University">Rajshahi Medical University</option>
                        <option value="Chandpur Science and Technology University">Chandpur Science and Technology University</option>
                        <option value="Sheikh Hasina Medical University">Sheikh Hasina Medical University</option>
                        <option value="Sylhet International University">Sylhet International University</option>
                        <option value="Bangladesh Islami University">Bangladesh Islami University</option>
                        <option value="Varendra University">Varendra University</option>
                        <option value="Hamdard University Bangladesh">Hamdard University Bangladesh</option>
                        <option value="North Western University">North Western University</option>
                        <option value="Chittagong Independent University ">Chittagong Independent University </option>
                        <option value="Sheikh Fazilatunnesa Mujib University">Sheikh Fazilatunnesa Mujib University</option>
                        <option value="Bangladesh Army University of Technology">Bangladesh Army University of Technology</option>
                        <option value="Khulna Khan Bahadur Ahsanullah University">Khulna Khan Bahadur Ahsanullah University </option>
                        <option value="Northern University of Business & Technology">Northern University of Business & Technology</option>
                        <option value="Green University Bangladesh">Green University Bangladesh</option>
                        <option value="Others">Others</option>
                    </select>
                    <br><br>

                    <label>Educational Background:   </label>
                    <br>
                    <select id="educational background" name="eduback">
                        <option value="educational background">Select Educational Background </option>
                        <option value="Bangla">Bangla</option>
                        <option value="English version">English Version</option>
                        <option value="British Curriculum">British Curriculum</option>
                        <option value="American Curriculum">American Currirulum</option>
                       
                    </select>
                    <br><br>

                    <label>Which Department: </label>
                    <br>
                    <input type="text" name="department" id="name" placeholder="Keep Department Name">
                    <br><br>

                    <label>Select City:   </label>
                    <br>
                    <select id="select city" name="city">
                        <option value="select city">Select City </option>
                        <option value="dhaka">Dhaka</option>
                        <option value="rajshahi">Rajshahi</option>
                        <option value="chittagong">Chittagong</option>
                        <option value="khulna">Khulna</option>
                        <option value="barisal">Barisal</option>
                        <option value="mymensingh">Mymensingh</option>
                        <option value="rangpur">Rangpur</option>
                        <option value="chandpur">Chandpur</option>
                        <option value="comilla">Comilla</option>
                        <option value="chuadanga">Chuadanga</option>
                        <option value="dinajpur">Dinajpur</option>
                        <option value="feni">feni</option>
                        <option value="faridpur">Faridpur</option>
                        <option value="gajipur">Gajipur</option>
                        <option value="brahmanbaria">Brahmanbaria</option>
                        <option value="bhola">Bhola</option>
                        <option value="magura">Magura</option>
                        <option value="naraynganj">Narayanganj</option>
                        <option value="pabna">Pabna</option>
                        <option value="nilphamari">Nilphamari</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="barguna">Barguna</option>
                        <option value="bagerhat">Bagerhat</option>
                        <option value="rajshahi">Rajshahi</option>
                        <option value="khagrachari">Khagrachari</option>
                        <option value="madaripur">Madaripur</option>
                        <option value="bogra">Bogra</option>
                        <option value="gopalganj">Gopalganj</option>
                        <option value="cox's bazar">Cox's Bazar</option>
                        <option value="habiganj">Habihanj</option>
                        <option value="jamalpur">Jamalpur</option>
                        <option value="jessore">Jessore</option>
                        <option value="jhalakati">Jhalakati</option>
                        <option value="lalminirhat">Lalmonirhat</option>
                        <option value="kushtia">Kushtia</option>
                        <option value="natore">Natore</option>
                        <option value="meherpur">Meherpur</option>
                        <option value="naogaon">Naogoan</option>
                        <option value="munshiganj">Munshiganj</option>
                        <option value="sunamganj">Sunamganj</option>
                        <option value="patuakhali">Patuakkhali</option>
                        <option value="pirojpur">Pirojpur</option>
                        <option value="tangail">Tangail</option>
                       
                    </select>
                    <br><br>

                    <label>Living Place: </label>
                    <br>
                    <input type="text" name="living_place" 
                    id="name" placeholder="Keep Living Place">
                    <br><br>

                    <label>Expected Location: </label>
                    <br>
                    <input type="text" name="lcation" 
                    id="name" placeholder="Keep Expected Location">
                    <br><br>
                            
         
            
        </div>
        </div>
        <input type="submit" value="Sign Up Now"
                    name="submit" id="submit">
    </div>
    </div>
    </form>  
    </body>
</html>