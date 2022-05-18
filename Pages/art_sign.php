<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "<br/>Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $param_username = $_POST['username'];
        $sql = "SELECT User_ID FROM users WHERE username ='$param_username' ";
        $qr= $con ->query($sql) or die($con->error);
        
        
        if(!$qr || mysqli_num_rows($qr) > 0){
            $row = $qr->fetch_assoc();
            if(isset($row)){
                $username_err = "<br/>This username is already taken.";
            } else{
                $username = trim($_POST["username"]);
            };
            
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "<br/>Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "<br/>Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "<br/>Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "<br/>Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password,is_artist) VALUES (?, ?,1)";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $username, $param_password);
            
            // Set parameters
            $username=trim($_POST['username']);
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: art_login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($con);
}
?>
 
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Neo Tones For Artists</title>
    <meta name="description" content="">
    <meta name="theme-color" content=""#8a5cffff>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/feed.css">
    <link rel="stylesheet" href="../css/common.css">
    <style>
            <?php
                include_once "../css/button.css";
            ?>
    </style>
        
    
</head>
<body align="center">
        <header>
            <div class="logo"><a href="index.html">NeoTones For Artists</a></div>
           
        </header>
    <div class=home_body>
        <div></div>
        <div class="home_content">
            <h2>Sign Up</h2>
            <p>Please fill this form to create an account. This will allow you to see data on your track sales.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!--<form action="test.php" method="post">-->
                <div class="form-group">
                
                    <input type="text" name="username" style="    padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;"placeholder="Username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group">
                
                    <input type="text" name="email" style="    padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;"placeholder="Email Address" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group">
               
                    <input type="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                 
                    <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" style="padding:6px; border:2px; background-color:white;"class="btn btn-primary" value="Submit">
                    <input type="reset" style="padding:6px; border:2px; background-color:white;" class="btn btn-secondary ml-2" value="Reset">
                </div>
                <p>Already have an account? <a href="art_login.php">Artist Login</a>.</p>
               
            </form>
        </div>    
        <div></div>
    </div>
</body>
</html>