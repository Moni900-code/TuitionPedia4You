<?php
    @include 'database.php';
    session_start();
    if(!isset($_SESSION['fullname'])){
        header('location:login.php');
    }

?>





<html lang="en">
    <head>
        <title>Tutor Profile</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" type="text/css" href="tutorprofile.css">
    </head>
    <body>
        <section class="py-5 my-5">
            
            <div class="container">
                <div class="navbar">
                    <img src="1.jpg" class="tuitionpedia">
                    <nav>
                        <ul>
                            <li><a href="Home.html">HOMEPAGE</a></li>
                           
                        </ul>
                    </nav>
                    
                </div> 
                <h1 class="mb-5">My Profile</h1>

                <div class="bg-dark shadow rounded-lg d-block d-sm-flex">
                
                    <div class="profile-tab-nav border right btn-light">
                        <div class="p-4">
                            <div class="img-circle text-center mb-3">
                                <img src="male.png" alt="Image" class="shadow">
                            </div>
                            <h4 class="text-center">
                                <?php 
                                echo $_SESSION['fullname'];
                                ?>
                            </h4>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                                <i class="fa fa-home text-center mr-1"></i> 
							Account
                            </a>
                            <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="true">
                                <i class="fa fa-key text-center mr-1"></i> 
                                Password
                            </a>
                            <a class="nav-link" id="security-tab" data-toggle="pill" href="#availabletuitions" role="tab" aria-controls="available tuitions" aria-selected="true">
                                <i class="fa fa-user text-center mr-1"></i> 
                                Available Tuitions
                            </a>
                            <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="true">
                                <i class="fa fa-tv text-center mr-1"></i> 
                                My tuitions
                            </a>
                            <a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="true">
                                <i class="fa fa-bell text-center mr-1"></i> 
                                Notification
                            </a>
                        </div>
                    </div>
                    <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <h3 class="mb-4">Account Settings</h3>
                        
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" value="" placeholder="<?php 
                                echo $_SESSION['fullname'];
                                ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                          <label>Phone number:</label>
                                          <input type="text" class="form-control" value="" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                          <label>Email:</label>
                                          <input type="text" class="form-control" value="" placeholder="New Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
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
                    <br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
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
                        <option value="feni">Feni</option>
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
                        <option value="patuakhali">Patuakhali</option>
                        <option value="pirojpur">Pirojpur</option>
                        <option value="tangail">Tangail</option>
                       
                    </select>
                                </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                          <label>Living Place:</label>
                                          <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Required Subject:</label>
                                        <br>
                                          <select name="required_subjects">
                                          <option name="required subject">Select Required Subject</option>
                                                <option name="General Math">General Math</option>
                                                <option name="Higher Math">Higher Math</option>
                                                <option name="Physics">Physics</option>
                                                <option name="Chemistry">Chemistry</option>
                                                <option name="Biology">Biology</option>
                                                <option name="ICT">ICT</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary">Update</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <form action="change-password.php" method="post">
                        <h3 class="mb-4">Password Settings</h3>

                            <?php
                            if(isset($_GET['error'])){
                                ?>
                                <p class="error"><?php echo $_GET['error']; ?> </p>
                                <?php
                            }
                            ?>

                            <?php
                            if(isset($_GET['success'])){
                                ?>
                                <p class="success"><?php echo $_GET['success']; ?> </p>
                                <?php
                            }
                            ?>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="op" class="form-control" placeholder="Type your old password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                          <label>New password</label>
                                          <input type="password" name="np" class="form-control" placeholder="Type your new password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                          <label>Confirm new password</label>
                                          <input type="password" name="c_np" class="form-control" placeholder="Confirm password">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary">Update</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </form>
                        </div>
                        <!-- <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                            <h3 class="mb-4">Notification Settings</h3>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="notification1">
                                    <label class="form-check-label" for="notification1">
                                        Assalamualaikum
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="notification2" >
                                    <label class="form-check-label" for="notification2">
                                        WalaikumusSalam
                                    </label>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary">Update</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </div> -->
                        <div class="tab-pane fade" id="availabletuitions" role="tabpanel" aria-labelledby="availabletuitions-tab">
                            
                            <h3 class="mb-4">Available Tuitions</h3>
                            <div class="form-group">
                            <div class="col-xs-12">
                                <!-- <h1>Find Tutors: </h1> -->
                                Tuition Code : <script>document.write(Math.random().toString(26).slice(2,7));</script>
                                    
                                <a class="item-block" href="#">
                                    <div  class="text-center"> <b>Chittagong University </b>Male Tutor Wanted
                                        in <b>Chittagong</b> </div>
                                    <header class="boxx">
                                        <div> <img src="any.png"></div>
                                        <div class="hgroup">
                                            <h4>Class: 10</h4>
                                            <h5>Group: Science</h5>
                                            <h5>Medium: Bangla</h5>
                                            <h5><b>Subject: Phy,Chem,Math</b></h5>
                                            <h5><b>Salary: 5000 BDT</b></h5>
                                        </div>
                                        <div class="header-meta">
                                            <span class="location">Chittagong</span>
                                            <span class="label label-success">3 Days/Week</span>
                                            <span class="label label-danger">Time: 4:00pm</span>
                                            <span class="label label-warning">Duration: 1.5 Hours</span>
                                            <span class="label label-info">Media Fee : 35%</span>
                                        </div>
                                    </header>
                                </a>
                        
                        
                                <button data-ng-click="gotoApplyPage(obj.tuitionCode)">Apply</button>
                        
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <!-- <h1>Find Tutors: </h1> -->
                                    Tuition Code : <script>document.write(Math.random().toString(26).slice(2,7));</script>
                                    <a class="item-block" href="#">
                                        <div  class="text-center"> <b>Dhaka University </b>Male Tutor Wanted
                                            in <b>Dhaka</b> </div>
                                        <header class="boxx">
                                            <div> <img src="any.png"></div>
                                            <div class="hgroup">
                                                <h4>Class: 9</h4>
                                                <h5>Group: Science</h5>
                                                <h5>Medium: Bangla</h5>
                                                <h5><b>Subject: Phy,Chem,Math</b></h5>
                                                <h5><b>Salary: 3500 BDT</b></h5>
                                            </div>
                                            <div class="header-meta">
                                                <span class="location">Chittagong</span>
                                                <span class="label label-success">3 Days/Week</span>
                                                <span class="label label-danger">Time: 8:00am</span>
                                                <span class="label label-warning">Duration: 1.5 Hours</span>
                                                <span class="label label-info">Media Fee : 35%</span>
                                            </div>
                                        </header>
                                    </a>
                            
                            
                                    <button data-ng-click="gotoApplyPage(obj.tuitionCode)">Apply</button>
                            
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <!-- <h1>Find Tutors: </h1> -->
                                        Tuition Code : <script>document.write(Math.random().toString(26).slice(2,7));</script>
                                        <a class="item-block" href="#">
                                            <div  class="text-center"> <b>Dhaka University </b>Female Tutor Wanted
                                                in <b>Dhaka</b> </div>
                                            <header class="boxx">
                                                <div> <img src="any.png"></div>
                                                <div class="hgroup">
                                                    <h4>Class: 11</h4>
                                                    <h5>Group: Science</h5>
                                                    <h5>Medium: English</h5>
                                                    <h5><b>Subject: Phy,Math</b></h5>
                                                    <h5><b>Salary: 8000 BDT</b></h5>
                                                </div>
                                                <div class="header-meta">
                                                    <span class="location">Chittagong</span>
                                                    <span class="label label-success">3 Days/Week</span>
                                                    <span class="label label-danger">Time: 8:00pm</span>
                                                    <span class="label label-warning">Duration: 1.5 Hours</span>
                                                    <span class="label label-info">Media Fee : 35%</span>
                                                </div>
                                            </header>
                                        </a>
                                
                                
                                        <button data-ng-click="gotoApplyPage(obj.tuitionCode)">Apply</button>
                                
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <!-- <h1>Find Tutors: </h1> -->
                                            Tuition Code : <script>document.write(Math.random().toString(26).slice(2,7));</script>
                                            <a class="item-block" href="#">
                                                <div  class="text-center"> <b>CUET </b>Male Tutor Wanted
                                                    in <b>Chittagong</b> </div>
                                                <header class="boxx">
                                                    <div> <img src="any.png"></div>
                                                    <div class="hgroup">
                                                        <h4>Class: 12</h4>
                                                        <h5>Group: Science</h5>
                                                        <h5>Medium: Bangla</h5>
                                                        <h5><b>Subject: Chem,Math</b></h5>
                                                        <h5><b>Salary: 4000 BDT</b></h5>
                                                    </div>
                                                    <div class="header-meta">
                                                        <span class="location">Chittagong</span>
                                                        <span class="label label-success">4 Days/Week</span>
                                                        <span class="label label-danger">Time: 6:00pm</span>
                                                        <span class="label label-warning">Duration: 1 Hours</span>
                                                        <span class="label label-info">Media Fee : 35%</span>
                                                    </div>
                                                </header>
                                            </a>
                                    
                                    
                                            <button data-ng-click="gotoApplyPage(obj.tuitionCode)" >Apply</button>
                                    
                                        </div>
                                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>
