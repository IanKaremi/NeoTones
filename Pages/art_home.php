<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Neo Tones Music Store</title>
        <meta name="theme-color" content="#8a5cffff">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="../css/my_stylesheet.css">
        <style>
           <?php
            
                include_once "../css/button.css";
            ?>
        </style>
        

    </head>
    <?php
        include_once"../art_top.php";

    ?>
   
   <?php
            $total_price=0;
            include"../config.php";
            if(isset($_SESSION['username'])){
                $sql = "SELECT * FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE AND `Artist Name` LIKE '%".$_SESSION['username']."%';";
                $query= $con->query($sql) or die($con->error);
                while($row = $query->fetch_assoc()){
                    $total_price += $row['Price'];
                }
                $num= $query->num_rows;
                echo"<h1>Sales for ".$_SESSION['username']."</h1>";
                echo"<p>For the last 30 days </p><hr>"; 
                
                echo"<h2>Your tracks have been purchased</h2>";
                echo"<p> ".$num."Times</p>";
                echo"<h2>With total revenue of</h2>";
                echo"<p>KSH".$total_price."</p>";
                echo"<h2>With 30 percent revenue share,you are due KSH:</h2>";
                echo(0.7*$total_price);
                echo"<br><br>";


        }else {
            $num=0;
            echo"User not Found";
        }
        ?>
   
            </div>
            <div></div>
        </div>
        <script src="" async defer></script>
        <footer>For support or enquiries, please email us at info@neotones.com</footer>
    </body>
</html>