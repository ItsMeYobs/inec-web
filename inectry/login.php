<?php

include 'connect.php';
session_start();

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $select_users = mysqli_query($conn, "SELECT * FROM `tbluseraccess` WHERE username = '$username' AND password = '$password'") or die('query failed');
    
    if(mysqli_num_rows($select_users) > 0){

        $row = mysqli_fetch_assoc($select_users);
  
        if($row['AccessType'] == 1){
           $_SESSION['admin_username'] = $row['Username'];
           $_SESSION['admin_password'] = $row['password'];
           header('location:admin_page.php');
  
        }elseif($row['AccessType'] == 2){
           $_SESSION['user_username'] = $row['username'];
           $_SESSION['user_password'] = $row['password'];
           header('location:home.php');
  
        }
  
     }else{
        $message[] = 'incorrect username or password!';
     }
  
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>INEC</title>
</head>
<body>
    <section class="header">
        <nav>
            <a href="index.html"><img src="images/logo.png" alt="Logo"></a>
            <div class="logo-text">
                <h1>INEC</h1>
                <p>ILOCOS NORTE ELECTRIC COOPERATIVE</p>
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="#" onclick="showContactUs()">CONTACT US</a></li>
                    <li><a href="#" onclick="showAboutUs()">ABOUT US</a></li>
                </ul>
            </div>
        </nav>

        <div id="main-content" class="main-content">
            <div class="middle-text">
                <h1>SILAW TI ILOCOS NORTE</h1>
            </div>
            <div class="login-form">
                <div class="input-box username">
                    <img src="images/profile.png" alt="Username Icon" class="icon">
                    <input type="text" id="username" placeholder="Username">
                </div>
                <div class="input-box password">
                    <img src="images/lock.png" alt="Password Icon" class="icon">
                    <input type="password" id="password" placeholder="Password">
                    <span class="toggle-password" onclick="togglePassword()">Show</span>
                </div>
                <div class="button-box">
                    <button type="submit" id = "button">Login</button>
                </div>
                <div class="create-account">
                    <a href="#">CREATE NEW ACCOUNT</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <div id="about-us" class="about-us">
        <div class="about-us-content">
            <h2>About Us</h2>
            <p>INEC’s service area covers the whole of Ilocos Norte which is composed of 2 cities, 21 municipalities and 559 barangays with 143,376 member-consumer-owners with 164,550 house connections as of December 31, 2018.</p>
            <button onclick="hideAboutUs()">Close</button>
        </div>
    </div>

    <!-- Contact Us Section -->
    <div id="contact-us" class="contact-us">
        <div class="contact-us-content">
            <h2>Area Offices</h2>
            <div class="contact-us-row first-row">

                <div class="contact-us-box">
                    <h3>Main and Area Office</h3>
                    <div class="contact-info">
                        <img src="images/loc.png" alt="Barangay Icon" class="icon">
                        <p>Brgy. Suyo, Dingras, Ilocos Norte</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/phone.png" alt="Phone Icon" class="icon">
                        <p>(077) 676-13-09</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/cp.png" alt="Mobile Icon" class="icon">
                        <p><b>Smart:</b> (0920) 919-8677<br><b>Globe:</b> (0908) 810-3855</p>
                    </div>
                </div>

                <div class="contact-us-box">
                    <h3>Area II Office</h3>
                    <div class="contact-info">
                        <img src="images/loc.png" alt="Barangay Icon" class="icon">
                        <p>Brgy. 23, San Matias, San Nicolas, Ilocos Norte</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/phone.png" alt="Phone Icon" class="icon">
                        <p>(077) 771-3343 | (077) 773-19-01</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/cp.png" alt="Mobile Icon" class="icon">
                        <p><b>Smart: </b>(0920) 959-4632 | (0998) 952-4632<br><b>Globe:</b> (0917) 512-4632 | (0917) 728-4632 | (0917) 800-4632</p>
                    </div>
                </div>

                <div class="contact-us-box">
                    <h3>Area III</h3>
                    <div class="contact-info">
                        <img src="images/loc.png" alt="Barangay Icon" class="icon">
                        <p>Brgy. Lacub, Batac City, Ilocos Norte</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/phone.png" alt="Phone Icon" class="icon">
                        <p>Not Available</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/cp.png" alt="Mobile Icon" class="icon">
                        <p><b>Smart:</b> (0920) 957-4632<br><b>Globe:</b>  (0917) 300-4632</p>
                    </div>
                </div>
                <div class="contact-us-box">
                    <h3>Area III</h3>
                    <div class="contact-info">
                        <img src="images/loc.png" alt="Barangay Icon" class="icon">
                        <p>Brgy. Lang-ayan, Currimao, Ilocos Norte</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/phone.png" alt="Phone Icon" class="icon">
                        <p>Not Available</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/cp.png" alt="Mobile Icon" class="icon">
                        <p><b>Smart:</b> (0920) 97-4632<br><b>Globe:</b>  (0917) 300-4632</p>
                    </div>
                </div>
            </div>

            <div class="contact-us-row second-row">

                <div class="contact-us-box">
                    <h3>Area IV Office</h3>
                    <div class="contact-info">
                        <img src="images/loc.png" alt="Barangay Icon" class="icon">
                        <p>Brgy. Masikil, Bangui, Ilocos Norte</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/phone.png" alt="Phone Icon" class="icon">
                        <p>(077) 676-1344 l (0917) 724-432</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/cp.png" alt="Mobile Icon" class="icon">
                        <p><b>Smart:</b> (0920) 958-4632<br><b>Globe:</b>  (0917) 729-46325</p>
                    </div>
                </div>
                <div class="contact-us-box">
                    <h3>Area V Office</h3>
                    <div class="contact-info">
                        <img src="images/loc.png" alt="Barangay Icon" class="icon">
                        <p>Brgy. San Joaquin, Sarrat, Ilocos Norte</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/phone.png" alt="Phone Icon" class="icon">
                        <p>(077) 781-28-96
                        </p>
                    </div>
                    <div class="contact-info">
                        <img src="images/cp.png" alt="Mobile Icon" class="icon">
                        <p><b>Smart:</b> (0928) 862-3624 | (0998) 950-4632<br><b>Globe:</b> (0917) 555-4632 | (0917) 500-4632</p>
                    </div>
                </div>
                <div class="contact-us-box">
                    <h3>Area VI Office</h3>
                    <div class="contact-info">
                        <img src="images/loc.png" alt="Barangay Icon" class="icon">
                        <p>Brgy. 16, San Marcos, San Nicolas, Ilocos Norte</p>
                    </div>
                    <div class="contact-info">
                        <img src="images/phone.png" alt="Phone Icon" class="icon">
                        <p>(077) 781-28-96
                        </p>
                    </div>
                    <div class="contact-info">
                        <img src="images/cp.png" alt="Mobile Icon" class="icon">
                        <p><b>Smart:</b> (0998) 868-9896<br><b>Globe:</b>  (0917) 630-4632</p>
                    </div>
                </div>
            </div>
            <button onclick="hideContactUs()">Close</button>
        </div>
    </div>


    <!-- Overlay -->
    <div id="overlay" class="overlay"></div>

    <script src="script.js"></script>
</body>
</html> 