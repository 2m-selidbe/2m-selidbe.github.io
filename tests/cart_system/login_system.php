<?PHP
$local_user = "admin"; 
$local_password = "admin"; 
if (isset($_POST['login'])) // check if user enter submit
{
    $u_post = $_POST['username']; // get user input 
    $p_post = $_POST['password']; // get password input 

    if ($local_user == $u_post) 
    {
        if ($local_password == $p_post) 
        {
            header("Location:list_test.html");
            die(); //you can arrive the user to welcome page from here 
        }
        echo "netocna lozinka!"; // if username is correct but password is not
        die(); 
    }
    else 
    {
        echo "netocno korisnicko ime!";  // if username is not correct then no need to check password ! .
        die(); 
    }
}
?>
<html> 
<head>
    <title>tests login</title>       
</head>
<body> 
    <form action="" method="POST" >
        <input type="text"  name="username" placeholder="Korisnicko ime" /> 
        </br> 
        <input type="password" name="password" placeholder="Lozinka" />
        </br> 
        <input type="submit" name="login" /> 
    </form>
</body>