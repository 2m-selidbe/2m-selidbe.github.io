<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin_page.php");
    exit;
}
 
// Include config file
require_once "../assets/php/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Molimo upišite korisničko ime.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Molimo upišite lozinku.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: admin_page.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Lozinka koju ste unjeli je netođna.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Netočno korisničko ime.";
                }
            } else{
                echo "Ups! Nešto je pošlo po krivu, molimo obratite se administratoru.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<html lang="hrv">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="odvoz bijele tehnike">
    <meta name="author" content="Mateo Martincic">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>2M Selidbe Admin Login
    </title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    </head>
    
    <body>
    
    <!--preloader-->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    
    
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        
                        <a href="../index.html" class="logo">2M<em> Selidbe</em></a>

                        
                        <a class='menu-trigger'>
                            <span>Meni</span>
                        </a>
                        
                    </nav>
                </div>
            </div>
        </div>
    </header>
    

    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="../assets/images/hmm.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>ovo je vas</h6>
                <h2>Admin<em> login</em></h2>
                <div class="main-button">
                    <form action="" method="POST" >
                        <input type="text"  name="username" placeholder="Korisnicko ime" /> 
                        </br> 
                        <input type="password" name="password" placeholder="Lozinka" />
                        </br> 
                        <input type="submit" name="login" /> 

                </div>
            </div>
        </div>
    </div>

    </section>
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p><a href="admin/admin_login.html">Admin login</a></p>
                    <p>
                        Copyright © 2020 2M
                        - Dizajnirao: <a href="https://github.com/AskNetworkNinja">Mateo Martinčić</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="../assets/js/jquery-2.1.0.min.js"></script>

    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script src="../assets/js/scrollreveal.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/imgfix.min.js"></script> 
    <script src="../assets/js/mixitup.js"></script> 
    <script src="../assets/js/accordions.js"></script>
    
    <script src="../assets/js/custom.js"></script>

  </body>
</html>