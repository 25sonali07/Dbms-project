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
        <title>View Exam</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php include "navbar.php";?><br>
           <div id="section">
                <?php include"sidebar.php";?><br><br><br>
                    <h3 class= "text">Welcome<?php echo $_SESSION["ANAME"];?></h3><br><hr><br>
                <div class="content">
                          <h3>View Exam</h3><br>



                    <?php
                       if(isset($_POST["submit"]))
                       { 
                          $edate=$_POST["da"].'-'.$_POST["mo"].'-'.$_POST["ye"];
                          $target="student/";
                          $target_file=$target.basename($_FILES["img"]["name"])
                          if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
                           {
                              $sq="insert into student(RNO,NAME,DOB,GEN,PHO,MAIL,ADDR,SCLASS,SSEC,SIMG,TID) values('{$_POST["rno"]}','{$_POST["name"]}','{$_POST["fname"]}','{$edate}','{$_POST["gen"]}','{$_POST["pho"]}','{$_POST["email"]}',
                              '{$_POST["addr"]}','{$_POST["cla"]}','{$_POST["sec"]}','{$target_file}','{$_SESSION["TID"]}')";
                              if($db->query($sql))
                              {
                                echo "<div class='success'>Insert Success..</div>";
                              }   
                            }
                           else
                           {
                              echo "<div class='error'>Insert failed..</div>";
                           }
                              
                          
                         
                        }
                     
                    ?>



                <form method="post"  action="<?php echo $_SERVER["PHP_SELF"];?>">
                <div class="lboxl">
                    <lable>Exam Date</lable><br>
                    <select name="edate" required class="input3">
                    <?php
                
                       $sl="SELECT * FROM exam";
                       $r=$db->query($sl);
                          if($r->num_rows>0)
                          {
                              echo"<option value=''>Select</option>";
                              while($ro=$r->fetch_assoc())
                              {
                                  echo"<option value='{$ro["EDATE"]}'>'{$ro["EDATE"]}'</option>"
                              }
                          }
                        
                    ?>
                    </select><br><br>

                </div>
                   <button type="submit" stye="float:right;" class="btn"  name="submit" >Add Student Details</button>
                   </form>
                   <br>
                   <div class="output">
                   <?php
                       if(isset($_POST["view"]))
                       {
                           echo "<h3>Exam Time Table</h3><br>";
                           $sql="Select * from exam where EDATE='{$_POST["edate"]}' and CLASS='{$_POST["cla"]}'";
                           $re=$db->query($sql);
                           if($re->num_rows>0)
                           {
                               echo '
                               <table border='1px' >
                                  <tr>
                                     <th>S.No</th>
                                     <th>Date/th>
                                     <th>Class</th>
                                     <th>Subject</th>
                                     <th>Exam Name</th>
                                     <th>Exam Type</th>
                                     <th>Session</th>
                                    </tr>
                                   ';
                                   $i=0;
                                   while($r=$re->fetch_assoc())
                                   {
                                       $i++;
                                       echo" 
                                           <tr> 
                                              <td>{$i}</td>
                                              <td>{$row["EDATE"]}</td>
                                              <td>{$row["CLASS"]}</td>
                                              <td>{$row["SUB"]}</td>
                                              <td>{$row["ENAME"]}</td>
                                              <td>{$row["ETYPE"]}</td>
                                              <td>{$row["SESSION"]}</td>
                                            </tr>
                                       ";
                                   }

                                }
                                else
                                {
                                    echo "No Record Found";
                                } 
                                echo "</table>";
                           }       
                        }
                   ?>

                </div>
            </div>       
        </div>    
       <?php include"footer.php";?> 
    <body>
</html>             