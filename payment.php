<!DOCTYPE html>
<html>

<head>

</head>
<body>
    <?php
    include_once"config.php";

    session_start();
    include_once"userid.php";

    foreach($_SESSION['cart'] as $key => $value)
    {
        echo $key." has the value". $value;
        echo "<br>";
        echo($user_id);

        
        $query="SELECT * FROM `works_list` WHERE ID='$value'";
        $qr= $con ->query($query) or die($con->error);
        if(isset($_SESSION['cart'])){

            if(!$qr || mysqli_num_rows($qr) > 0)
            {
           while($row = $qr->fetch_assoc()) {
               echo"<hr> <div class='entry'>";
               echo "<div class='img'> <img style='height:100px; width=100px;'src="
               .$row['Art'].">"

               ."</div><div><p align=left id='entry_title'>"
               .$row['Name']."    "
               ."</p><p align=left id='entry_artist'>"
               .$row['Artist Name']."    "
               ."</p></div>"
               ."<button><a href=item_delete.php?ID=" .$row['ID']. ">Remove</a></button>"
               ."</div>";
               echo"</div>";
            }
            $sql = "INSERT INTO `purchases` (`purchaseID`, `userID`, `workID`, `date`) VALUES (NULL, $user_id, $value, current_timestamp());";
            $q2=$con->query($sql) or die($con->error);
            echo"<hr>";
       }else{
           echo" Zero results";
       };

     }else{
         echo"Your cart is empty.";
     }      

    }
    ?>
</body>
</html>