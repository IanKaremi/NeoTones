<body align="center">
    <header>
        <div class="logo" align="left"><a href="index.php">NeoTones</a></div>
        <div class="toolbar">
            <div><a href="feed.html">Feed</a></div>
            <div><a href="likes.php">Purchased</a></div>
            <div class="drop">
                <div><a>Genres</a>
                    <div class="on_hover">
                        <a href="Pages/afro.php">Afro</a>
                        <a href="Pages/hip.php">Hip-hop & RnB</a>
                        <a href="Pages/gospel.php">Gospel</a>
                        <a href="Pages/electronic.php">Electronic</a>
                        <a href="Pages/pop.php">Pop</a>
                        <a href="Pages/rock.php">Rock</a>
                        <a href="Pages/reggae.php">Reggae</a>
                        <a href="Pages/classical.php">Classical</a>
                        <a href="Pages/country.php">Country</a>
                        <a href="Pages/Jazz.php">Jazz</a>                   
                    </div>
                </div>
            </div>
            <div><form action="Pages/search.php" class="s_top" method="post"><input type='search' name="search" placeholder="Search" style="padding: 6px; border-radius: 0; border: none; margin-left: 5px; margin-right:5px;">
            <input type="submit" value="Go" style="padding: 6px; border:1px solid transparent; border-radius: 2px; background-color: white;"></form></div>
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
        <div>
            <a href="cart_view.php">View Cart</a>
            <a href="checkout.php">Checkout</a>
        </div>
        <div class="home_content">