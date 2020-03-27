<?php

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
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>

        <?php include "navbar.php";?><br>
        <img src="../index.png" style="margin-left:90px;" class="sha">

        <div id="section">
            <?php include"sidebar.php";?><br>

            <div class="content">
                <h3 class= "text">Welcome<?php echo $_SESSION["ANAME"];?></h3><br><hr><br>
                    <h3>School Information</h3><br>
                <img src="../home.png" class="image" > 
                <p class ="para">
                     School management System is a complete school management software designed to automate a school's diverse openssl_get_cert_locations
                     from classes, exams to school events calender.
                </p>


                <p class="para"> 
                   This school software has a powerful online community to bring parents, teachers and students on a common interactive
                   platform. It is a paperless office automation solution for today's modern schools. The School Management System 
                   provides the facility to carry out all day to day activities of the school.
                </p>
            </div>      
            <?php include"footer.php";?>    
    </body>
</html>