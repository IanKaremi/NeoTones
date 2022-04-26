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
                        <a href="hip.php">Hip-hop & RnB</a>
                        <a href="gospel.php">Gospel</a>
                        <a href="electronic.php">Electronic</a>
                        <a href="pop.html">Pop</a>
                        <a href="rock.html">Rock</a>
                        <a href="reggae.html">Reggae</a>
                        <a href="classical.html">Classical</a>
                        <a href="country.html">Country</a>
                        <a href="Jazz.html">Jazz</a>                   
                    </div>
                </div>
            </div>
            <div class="s_top"><form action="search.php" method="post"><input type="text" name="search" placeholder="Search"><input type="submit" value="Go"></form></div>
            <?php
            session_start();
            if( $_SESSION['login']==true){
                echo"<div>". $_SESSION['username']."</div>";
                echo"<div id= 'login'><a href='login.php'>Log Out</a></div>";
           }else{
               echo"<div id='login'><a href='login.php'>Login</a></div>";
               echo"<div id='sign_up'><a href='signup.php'>Sign_Up</a></div>";
           }
            ?>

        </div>
    </header>
    <div class="home_body">
        <div></div>
        <div class="home_content">