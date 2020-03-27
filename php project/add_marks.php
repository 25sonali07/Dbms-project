<?php

    include "database.php" ;
    session_start();
    if(!isset($_SERVER["TID"]))
    {
        echo "<script>window.open('teacher_login.php?mes=Access Denied..','_self');</script>";
    }
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>add marks</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php include "navbar.php";?><br>
           <div id="section">
                <?php include"sidebar.php";?><br><br><br>
                    <h3 class= "text">Welcome<?php echo $_SESSION["ANAME"];?></h3><br><hr><br>
                <div class="content">
                          <h3>Add Marks</h3><br>
                    <?php
                      if(isset($_GET["err"]))
                      {
                          echo "<div class='error'>{$_GET["err]}</div>";
                      }
                     
                  <form method="get"  action="mark.php">
                 <div class="lboxl">
                    <lable>Enter Roll No</lable><br>
                    <input type="text" class="input3" name="rno"><br><br>
                    </select>
                </div>
                <button type="submit"  class="btn" name="view">View</button>
                </form>
            </div> 
        </div>    
       <?php include"footer.php";?> 
    <body>
</html>             