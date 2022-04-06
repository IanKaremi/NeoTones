<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Electronic - Neo Tones</title>
        <meta name="description" content="">
        <meta name="theme-color" content=""#8a5cffff>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="feed.css">
        <link rel="stylesheet" href="common.css">
        <style>
            h1{
                margin-left: 1em;
            }

            img{
                height:200px;
                width:200px;
                padding-top: 50px;
                padding-left: 5px;
                padding-right: 5px;
            }

            .entry{
                display:grid;
                grid-template-columns: 1fr 3fr 1fr;
                grid-template-rows: 20em 20em;
                
            }
            #entry_title{
                font-size: 40px;
                font-weight: 700;
            }

            #entry_artist{
                font-size: 30px;
                font-weight: 700;
            }

            button{
                color:azure;
                font-size:larger;
                font-weight:400;
                background-color: rgb(119, 211, 13);
                border:1px solid black;
                border-radius:5px;
                -webkit-border-radius:5px;
                -moz-border-radius:5px;
                -ms-border-radius:5px;
                -o-border-radius:5px;
                width:10rem;
                margin-right: 5px;
                margin-top: 50px;
                padding: 10px;
            }
        </style>
    </head>
    <body align="center">
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
                <div id="login"><a href="login.php">Login</a></div>
                <div id="sign_up"><a href="signup.php">Sign_Up</a></div>

            </div>
        </header>
        <div class="home_body">
            <div></div>
            <div class="home_content">
                <h1 align="left">Best Of Electronic Music</h1>
                <iframe id="log"></iframe>
           
                <?php
                    echo "<link rel='stylesheet' type='text/css' href='feed.css' />";
                    require_once"config.php";
                    $elec="SELECT * FROM `works` WHERE `Genre`='electronic';";

                    $qr= $con ->query($elec) or die($con->error);
                    $var;

                    
                    
                    if(!$qr || mysqli_num_rows($qr) > 0)
                    {
                        echo"<hr> <div class='entry'>";
                        while($row = $qr->fetch_assoc()) {
                            echo "<div class='img'> <img src="
                            .$row['Art'].">"

                            ."</div><div><p align=left id='entry_title'>"
                            .$row['Name']."    "
                            ."</p><p align=left id='entry_artist'>"
                            .$row['Artist']."    "
                            ."</p></div><div>"."<div></div>"
                            ."</div>"
                            .$row['Release_Date']."    "."<br>"
                            .$row['Type']."    "."<br>"
                            .$row['Length']."    "."<br>"
                            .$row['Tags']."    "
                            ."<div>"
                            .$row['Description']."    "
                            ."</div><div>"
                            .$row['Price']."    "
                            ."</div>";
                           
                            
                        }

                        echo"</div>"."<hr>";
                        
                        
                   }else{
                        echo"0 results";
                    };
               
                ?>
             
             </div>
           
            </div>
            <div></div>
        </div>
        <script src="login_signup.js" async defer></script>
    </body>
</html>