<?php

    include "database.php" ;
    session_start();
    if(!isset($_SERVER["TID"]))
    {
        echo "<script>window.open('teacher_login.php?mes=Access Denied..','_self');</script>";
    }
    $sql="SELECT * FROM staff where TID={$_GET["id"]}";
       $res=$db->query($sql);
       if($res->num_rws>0)
       {
           $row=$res->fetch_assoc();
       }
   
   
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>view staff</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php include "navbar.php";?><br>
        <img src="#" style="margin-left:90px;" class="sha">   

           <div id="section">
                <?php include"sidebar.php";?><br><br><br>
                <h3 class= "text">Welcome<?php echo $_SESSION["ANAME"];?></h3><br><hr><br>
                <div class="content1">

                   <h3>View Staff Details</h3><br>
                   <div class="ibox">
                       <img src="<?php echo $row["IMG"];?>" height="230" width="230">
                    </div>
                    <div class="tsbox">
                    <table border="1px>" 
                        <tr><th>Name</th><?php echo $row["TNAME"];<td><td></tr>
                        <tr><th>Qualification</th><?php echo $row["QUAL"];<td><td></tr>
                        <tr><th>Salary</th><?php echo $row["SAL"];<td><td></tr>
                        <tr><th>Phone</th><?php echo $row["PNO"];<td><td></tr>
                        <tr><th>E-Mail</th><?php echo $row["MAIL"];<td><td></tr>
                        <tr><th><Address></Address></th><?php echo $row["PADDR"];<td><td></tr>
                   </table>  
                   </div>
                </div>
            </div>       

        <?php include"footer.php";?>
       
        
    </body>
</html>    