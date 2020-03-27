<!DOCTYPE html>
<html>
    <head>
        <title>School Management System</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body class="back">
        <?php include "navbar.php";?>
        <img src="C:\Users\Sonal\OneDrive\Desktop\index.png" width="800px">

        <div class="login">
            <h1 class="heading">Admin Login</h1>
            <div class="log">
                <form method="post" action= "<?php echo $_SERVER ["PHP_SELF"];?>">
                    <label> User Name </label><br>
                    <input type="text" name="Name" required class="input"><br><br>
                    <label>Password</label><br>
                    <input type="password" name="Password" required class="input"><br>
                    <button type="submit" class="btn" name="login">Login Here</button>
                </form>
            </div>
        </div>
        <div class="footer">
            <footer><p>copyright &copy;</p></footer>
        </div>

    </body>
</html>
