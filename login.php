<?php

session_destroy();

session_start();

// Include config file
require_once "config.php";

$username = $password = "";

if (isset($_POST['login'])){

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
                    
    $query 		= mysqli_query($con, "SELECT * FROM users WHERE  password='$password' and username='$username'");
    $row		= mysqli_fetch_array($query);
    $num_row 	= mysqli_num_rows($query);

                    if ($num_row > 0)
                        {
                            $_SESSION["login"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $row['username'];
                            header('location: index.php');
                            echo"Success!";
                        }
                    else
                        {
                            echo 'Invalid Username and Password Combination';
                           
                        }
                    }
                
    mysqli_close($con);

?>
 
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login - Neo Tones</title>
        <meta name="description" content="">
        <meta name="theme-color" content=""#8a5cffff>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="feed.css">
        <link rel="stylesheet" href="common.css">
        
    
    </head>
    <body align=center>
        <header>
            <div class="logo" align="left"><a href="index.html">NeoTones</a></div>
            <div class="toolbar">
                <div><a href="feed.html">Feed</a></div>
                <div><a href="likes.html">Purchased</a></div>
                <div class="drop">
                    <div><a>Genres</a>
                        <div class="on_hover">
                            <a href="afro.html">Afro</a>
                            <a href="hip.html">Hip-hop & RnB</a>
                            <a href="gospel.html">Gospel</a>
                            <a href="electronic.html">Electronic</a>
                            <a href="pop.html">Pop</a>
                            <a href="rock.html">Rock</a>
                            <a href="reggae.html">Reggae</a>
                            <a href="classical.html">Classical</a>
                            <a href="country.html">Country</a>
                            <a href="Jazz.html">Jazz</a>                   
                        </div>
                    </div>
                </div>
                <div class="s_top"><input type="text" placeholder="search"></div>
             
            </div>
        </header>
        <div class="home_body">
            <div></div>
        <div class="home_content">
            <h1 align=left>Login</h1>
            <p>Please fill in your credentials to login.</p>

            <?php 
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>
            <div class="form">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                </div>    

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                </div>

                <div class="form-group">
                    <input type="submit"  name="login" value="login">
                </div>
                <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
            </form>
        </div>
        </div>
        <div></div>
    </div>
  
</body>
</html>