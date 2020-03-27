<?php

    include "database.php" ;
    session_start();
    if(!isset($_SERVER["EID"]))
    {
        echo "<script>window.open('view_exam.php?mes=Access Denied..','_self');</script>";
    }
   
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>view exam</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>

        <?php include "navbar.php";?><br>
        <img src="../index.png" style="margin-left:90px;" class="sha">

        <div id="section">
                <?php include"sidebar.php";?><br><br><br>
                <h3 class= "text">Welcome<?php echo $_SESSION["ANAME"];?></h3><br><hr><br>
            <div class="content">
                    <h3>View Exam Time Table Details</h3><br>
                    <?php
                      if(isset($_GET["mes"]))
                      {
                          echo "<div class='error'>{$_GET["mes"]}</div>";
                      }
                    ?>
                    <table border="1px">
                       <tr>
                          <th>S.No</th>
                          <th>Class</th>
                          <th>Subject</th>
                          <th>Exam Name</th>
                          <th>Term</th>
                          <th>Date</th>
                          <th>Session</th>
                          <th>Delete</th>
                       </tr> 
                       <?php
                            $s="select * from exam";
                            $res=$db->query($s);
                            if($res->num_rows>0)
                            {
                                $i=0;
                                while($r=$res->fetch_assoc())
                                $i++;
                                echo"<tr>
                                    <td>{$i}</td>
                                    <td>{$row["CLASS"]}</td>
                                    <td>{$row["SUB"]}</td>
                                    <td>{$row["ENAME"]}</td>
                                    <td>{$row["ETYPE"]}</td>
                                    <td>{$row["EDATE"]}</td>
                                    <td>{$row["SESSION"]}</td>
                                
                                    <td><a href='exam_delete.php?id={$r["EID"]}' class='btnr'>Delete</a></td>
                                    </tr>
                                ";    
                    
                                
                            }
                                echo "</table>";
                        }
                        else
                        {
                            echo"<p> No Record Found</p>";
                        }
                         
                       ?>
                    </table>
                </div>  
        </div>
        <?php include"footer.php";?>  

    </body>
</html>    
