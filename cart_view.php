<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cart - Neo Tones</title>
        <meta name="description" content="">
        <meta name="theme-color" content=""#8a5cffff>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/feed.css">
        <link rel="stylesheet" href="css/common.css">
        <style>
           <?php
            
                include_once "../css/button.css";
            ?>
        </style>
        

    </head>
    <?php
        include_once"top.php";
        echo "<h1 align=left>Cart</h1>";
                  require_once"config.php";

                  $query="SELECT * FROM `works_list` WHERE ID IN (".implode(',',$_SESSION['cart']).")";
                  $qr= $con ->query($query) or die($con->error);
            if(isset($_SESSION['cart'])){

                  if(!$qr || mysqli_num_rows($qr) > 0)
                  {
                      while($row = $qr->fetch_assoc()) {
                          echo"<hr> <div class='entry'>";
                          echo "<div class='img'> <img src="
                          .$row['Art'].">"

                          ."</div><div><p align=left id='entry_title'>"
                          .$row['Name']."    "
                          ."</p><p align=left id='entry_artist'>"
                          .$row['Artist Name']."    "
                          ."</p></div><div>"
                          ."</div><div>"."Release date:   "
                          .$row['Release_Date']."    "."<br>"."Release Type:   "
                          .$row['Type']."    "."<br>"."Length:    "
                          .$row['Length']."    "."<br>"
                          .$row['Tags']."    "
                          ."</div><div>"
                          .$row['Description']."    "
                          ."</div><div>"."Price: Ksh. "
                          .$row['Price']." "
                          ."<button><a href=item_delete.php?ID=" .$row['ID']. ">Remove</a></button>"
                          ."</div>";
                          echo"</div>";
                      }

                      echo"<hr>";
                  }else{
                      echo" Zero results";
                  };

                }else{
                    echo"Your cart is empty.";
                }      

                  mysqli_close($con);
                  include_once "bottom.html"
                ?>
</html>