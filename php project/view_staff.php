<?php

    include "database.php" ;
    session_start();
    if(!isset($_SERVER["AID"]))
    {
        echo "<script>window.open('view_staff.php?mes=Access Denied..','_self');</script>";
    }
    $sql="SELECT * FROM staff where TID={$_GET["id"]}";
       $res=$db->query($sql);
       if($res->num_rows>0)
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
        <img src="../index.png" style="margin-left:90px;" class="sha">   

           <div id="section">
                <?php include"sidebar.php";?><br><br><br>
                <h3 class= "text">Welcome<?php echo $_SESSION["ANAME"];?></h3><br><hr><br>
                <div class="content1">

                   <h3>View Staff Details</h3><br>
                   
                  <form id="frm" autocomplete="off">
                        <input type="text"  id="txt" class="input">
                   </form>
                   <br>
                    <div id="box"></div>
                 </div> 
             </div> 

        <?php include"footer.php";?>
         <script>
              $(document).ready(function(){
                  $("#txt").keyup(function){
                    var txt=$("#txt").val();
                     if(txt!="")
                    {
                         $.post("search.php",{s:txt},function(data){
                             $("#box").html(data);

                         });
                     }
                  });
              });
         </script>
        
    </body>
</html>    