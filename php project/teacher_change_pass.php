?php

    include "database.php" ;
    session_start();
    if(!isset($_SERVER["AID"]))
    {
        echo "<script>window.open('index.php?mes=Access Denied..','_self');</script>";
    }
   
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>change password</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>

        <?php include "navbar.php";?><br>
        <img src="#" style="margin-left:90px;" class="sha">

        <div id="section">
                <?php include"sidebar.php";?><br><br><br>
                <h3 class= "text">Welcome<?php echo $_SESSION["ANAME"];?></h3><br><hr><br>
            <div class="content1">
                <h3>Change Password</h3><br>
                <div class="lboxl">
                <?php
                        if(isset($_POST["submit"]))
                        {
                            $sql="select * from staff where TPASS='{$_POST["opass"]}' and TID='{$_SESSION["TID"]}'";
                            $result=$db->query($sql);
                            if($res->num_rows>0)
                            {
                               if($_POST["npass"]==$_POST["cpass"])
                               {
                                   $s="UPDATE staff SET TPASS='{$_POST["npass"]}' where TID='{$_SESSION["TID"]}'";
                                   $db->query($s);
                                   echo "<div class='success'>Password Changed</div>";
                               }
                               else
                               {
                                   echo"<div class='error'>Password Mismatch</div>";
                               }     
                            }
                            else
                            {
                                echo"<div class='error'>Invalied Password </div>";
                            }
                        }
                        else
                        {
                            echo"<div class='error'>Invalied Password </div>";
                        }

                        
                    ?>

                <form method="post" action= "<?php echo $_SERVER ["PHP_SELF"];?>">
                    <label>Old Password</label><br>
                    <input type="text" class="input3" name="opass"><br><br>
                    <label>New Password</label><br>
                    <input type="text" class="input3" name="npass"><br><br>
                    <label>Confirm Password</label><br>
                    <input type="text" class="input3" name="cpass"><br><br>
                    <button type="submit" class="btn" style="float:left" name="submit">Change Password</button>
                </form>
                    
            </div>
        </div>
        <?php include"footer.php";?>  
    </body>
</html>            