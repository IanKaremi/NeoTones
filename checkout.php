<?php
        include_once"top.php";
        echo "<h1 align=left>Cart</h1>";
                  require_once"config.php";

                  $query="SELECT * FROM `works_list` WHERE ID IN (".implode(',',$_SESSION['cart']).")";
                  $qr= $con ->query($query) or die($con->error);
                  
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
                          ."<button><a href=".$row['url'].">Download</a></button>"
                          ."</div>";
                          echo"</div>";
                      }

                      echo"<hr>";
                  }else{
                      echo"0 results";
                  };

                  mysqli_close($con);
                  include_once "bottom.html"
                ?>