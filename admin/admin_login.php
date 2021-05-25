<?PHP
$local_user = "2madmin"; 
$local_password = "Adm1N!"; 
if (isset($_POST['login'])) // check if user enter submit
{
    $u_post = $_POST['username']; // get user input 
    $p_post = $_POST['password']; // get password input 

    if ($local_user == $u_post) 
    {
        if ($local_password == $p_post) 
        {
            session_start();
            $_SESSION["loggedin"] = true;
            header("Location:admin_page.php");
            die(); //you can arrive the user to welcome page from here 
        }
        echo "Netočna lozinka!"; // if username is correct but password is not
        die(); 
    }
    else 
    {
        echo "Netočno korisničko ime!";  // if username is not correct then no need to check password ! .
        die(); 
    }
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
                <h6>ovo je vaš</h6>
                <h2>Admin<em> login</em></h2>
                <div class="main-button">
                    <form action="" method="POST" >
                        <input type="text"  name="username" placeholder="Korisničko ime" /> 
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
                    <p><a href="admin_login.html">Admin login</a></p>
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
