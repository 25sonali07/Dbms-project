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
        <title>view mark</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php include "navbar.php";?><br>   

           <div id="section">
                <?php include"sidebar.php";?><br><br><br>
                <h3 class= "text">Welcome<?php echo $_SESSION["TNAME"];?></h3><br><hr><br>
                <div class="content1">
                <h3>Mark Details</h3><br>
                <form method="post" action ="<?php echo $_SERVER["PHP_SELF"];?>">
                <div class="lbox1">
                      
                    <<label>Enter Roll No</label><br>
                    <input type="text"  class="input3" name="rno"><br><br>
                </div>
                <button type="submit"  class="btn" name="view">View Details</button>
                </form>  <br><br>
                <div class="Output">
                    <?php
                       if(isset($_POST["view"]))
                       {
                           echo"<h3>Mark Details</h3><br>";
                           $sql="select * from mark REGNO='{$_POST["rno"]}'";
                           $re=$db->query($sql);
                           if($re->num_rows>0)
                           {
                               echo'
                               <table border="1px">
                                 <tr>
                                    <th>S.No</th>
                                    <th>Reg.No</th>
                                    <th>Class</th>
                                    <th>Term</th>
                                    <th>Subject</th>
                                    <th>Mark</th>
                                    
                                 </tr>
                               ';
                               $i++;
                               echo"<tr>
                                       <td>{$i}</td>
                                       <td>{$r["REGNO"]}</td>
                                       <td>{$r["CLASS"]}</td>
                                       <td>{$r["TERM"]}</td>
                                       <td>{$r["SUB"]}</td>
                                       <td>{$r["MARK"]}</td>
                                       
                                       <td><a href='exam_delete.php?id={$r["EID"]}' class='btnr'>Delete</a></td>
                                   </tr>
                                ";   
                            }
                            else
                            {
                                echo " No Record Found"
                            }
                       }
                       else
                       {
                               echo "</table>"
                       }


                    ?>

                </div>
            </div>
        </div>      
        
        <?php include"footer.php";?>
    </body>
</html>    