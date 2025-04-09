<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
    <?php
        
        if (isset($_POST["submit"])) {
            $phnnum=$_POST["phnnum"];
            $pass=$_POST["pass"];
            $cpass=$_POST["cpass"];
            $email=$_POST["email"];
            $fullname=$_POST["fullname"];
            $Gender=$_POST["Gender"];
            $membertype=$_POST["membertype"];
            $university=$_POST["university"];
            $eduback=$_POST["eduback"];
            $department=$_POST["department"];
            $city=$_POST["city"];
            $living_place=$_POST["living_place"];
            $location=$_POST["location"];
        //    $fullname = $_POST["fullname"];
        //    $email = $_POST["email"];
        //    $pass = $_POST["pass"];
        //    $cpass = $_POST["cpass"];
           
           $passwordHash = password_hash($pass, PASSWORD_DEFAULT);

           $errors = array();
           
       
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
        
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
            
            //$sql = "INSERT INTO registration (phnnum,pass,email,fullname,Gender,membertype,university,eduback,department,city,living_place,location) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
            $sql="INSERT INTO registration (phnnum, pass, email, fullname) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                //mysqli_stmt_bind_param($stmt,"isssssssssss",$phnnum,$pass,$email,$fullname,$Gender,$membertype,$university,$eduback,$department,$city,$living_place,$location);
                mysqli_stmt_bind_param($stmt,"isss",$phnnum,$pass,$email,$fullname);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="tuly.php" method="POST">
            <div class="container">
            
                <div class="navbar">
                     <img src="images/tuitonpedia.jpg" class="tuitionpedia">
                     <nav>
                         <ul>
                             <li><a href="Home.html">HOMEPAGE</a></li>
                             <a href="login.html">          
                                <button type="button" class="btnlogin">LOGIN</button>
                            </a>
                         </ul>
                     </nav>
                     
                 </div> 
                 <h2>Registration Here</h2> 
                <div class="register">
                    <div class="scrollbox">
                        <div class="scrollbox-inner">
                        <label>Type your phone number: </label>
                            <br>
                            <input type="text" name="phnnum"
                            id="phoneno" placeholder="Your phone no">
                            <br><br>
                            <label>Give a password for futher use: </label>
                            <br>
                            <input type="password" name="pass" 
                            id="password" placeholder="Password">
                            <br><br>

                    <label>Confirm Password(same as above): </label>
                    <br>
                    <input type="password" name="cpass" 
                    id="confirmpassword" placeholder="Password">
                    <br><br>

                    <label>Type your email address(optional): </label>
                    <br>
                    <input type="text" name="email" 
                    id="email" placeholder="Type your email">
                    <br><br>

                    <label>Type your full name: </label>
                    <br>
                    <input type="text" name="fullname" 
                    id="fullname" placeholder="Full Name">
                    <br><br>

                    <label>Select Gender: </label>
                    <br>
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="Gender" 
                    id="male" value="male">
                    &nbsp;
                    <span id="male">Male</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="Gender"
                    id="female" value="female">
                    &nbsp;
                    <span id="female">Female</span>
                    <br><br>

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
                                 
                    <label>University: </label>
                    <br>
                    <select id="university" name="university">
                        <option value="university">Select University</option>
                        <option value="dhaka university">Dhaka University(DU)</option>
                        <option value="dhaka university">Jagannat University(JNU)</option>
                        <option value="dhaka university">Jahangirnagar University(JU)</option>
                        <option value="dhaka university">Dhaka Medical College(DMC)</option>
                        <option value="dhaka university">Sir Salimullah Medical College(SSMC)</option>
                        <option value="dhaka university">Shaheed Suhrawardy Medical college(ShSMC)</option>
                        <option value="dhaka university">Bangladesh University of Engineering and Technology(BUET)</option>
                        <option value="dhaka university">Ahsanullah Univrsity of Science and Technology(AUST)</option>
                        <option value="dhaka university">Brac University(BU)</option>
                        <option value="dhaka university">North South University(NSU)</option>
                        <option value="dhaka university">Chittagong University(CU)</option>
                        <option value="dhaka university">Chittagong University of Engineering and Technology(CUET)</option>
                        <option value="dhaka university">Chittagong Veterinary and Animal Science University(CVASU)</option>
                        <option value="dhaka university">Chittagong Medical College(CMC)</option>
                        <option value="dhaka university">Khulna University(KU)</option>
                        <option value="dhaka university">Islamic University</option>
                        <option value="dhaka university">National University</option>
                        <option value="dhaka university">Bangabandhu Sheikh Mujib Medical University</option>
                        <option value="dhaka university">Bangabandhu Sheikh Mujibur Rahman Agricultural University</option>
                        <option value="dhaka university">Hajee Mohammad Danesh Science & Technology University</option>
                        <option value="dhaka university">Mawlana Bhashani Science & Technology University</option>
                        <option value="dhaka university">Patuakhali Science And Technology University</option>
                        <option value="dhaka university">Sher-e-Bangla Agricultural University</option>
                        <option value="dhaka university">Rajshahi University of Engineering & Technology</option>
                        <option value="dhaka university">Khulna University of Engineering & Technology</option>
                        <option value="dhaka university">Dhaka University of Engineering & Technology</option>
                        <option value="dhaka university">Noakhali Science & Technology University</option>
                        <option value="dhaka university">Comilla University</option>
                        <option value="dhaka university">Sylhet Agricultural University</option>
                        <option value="dhaka university">Jessore University of Science & Technology</option>
                        <option value="dhaka university">Pabna University of Science and Technology</option>
                        <option value="dhaka university">Bangladesh University of Professionals</option>
                        <option value="dhaka university">University of Barishal</option>
                        <option value="dhaka university">Rajshahi Medical University</option>
                        <option value="dhaka university">Chandpur Science and Technology University</option>
                        <option value="dhaka university">Sheikh Hasina Medical University</option>
                        <option value="dhaka university">Islamic Arabic University</option>
                        <option value="dhaka university">Mawlana Bhashani Science and Technology University</option>
                        <option value="dhaka university">BRAC University</option>
                        <option value="dhaka university">Sylhet International University</option>
                        <option value="dhaka university">Bangladesh Islami University</option>
                        <option value="dhaka university">Varendra University</option>
                        <option value="dhaka university">Hamdard University Bangladesh</option>
                        <option value="dhaka university">North Western University</option>
                        <option value="dhaka university">Chittagong Independent University </option>
                        <option value="dhaka university">Rajshahi Science & Technology University (RSTU)</option>
                        <option value="dhaka university">Sheikh Fazilatunnesa Mujib University</option>
                        <option value="dhaka university">Bangladesh Army University of Technology</option>
                        <option value="dhaka university">Khulna Khan Bahadur Ahsanullah University </option>
                        <option value="dhaka university">Northern University of Business & Technology</option>
                        <option value="dhaka university">Green University Bangladesh</option>
                        <option value="dhaka university">Others</option>
                    </select>
                    <br><br>

                    <label>Educational Background:   </label>
                    <br>
                    <select id="educational background">
                        <option value="educational background">Select Educational Background </option>
                        <option value="Bangla">Bangla</option>
                        <option value="English version">English Version</option>
                        <option value="British Curriculum">British Curriculum</option>
                        <option value="American Curriculum">American Currirulum</option>
                       
                    </select>
                    <br><br>

                    <label>Which Department: </label>
                    <br>
                    <input type="text" name="department" 
                    id="name" placeholder="Keep Department Name">
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
                    <input type="text" name="location" 
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



