<?php

    include "database.php" ;
    session_start();
    if(!isset($_SERVER["CID"]))
    {
        echo "<script>window.open('add_stud.php?mes=Access Denied..','_self');</script>";
    }
   
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>add student</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php include "navbar.php";?><br>
        <img src="../index.png" style="margin-left:90px;" class="sha">
           <div id="section">

               <h3 class= "text">Welcome<?php echo $_SESSION["ANAME"];?></h3><br><hr><br>
                <div class="content">
                <h3> View Student Detail</h3><br>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <div class="lbox1">
                    <label>Class</label><br>
                <select name="cla" required class="input3">
                   <?php
                   $sl="SELECT DISTINCT (CNAME) FROM class";
                   $r=$db->query($sl);
                   if($r->num_rows>0)
                    {
                        echo"<option vlaue=''>Select</option>";
                           while($ro=$r->fetch_assoc())
                           {
                                echo"<option vlaue='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
                           }
                     } 
                    ?>     
                          
                </select>    
                <br><br>

                <div class="rbox" >
                   <label>Section</label> <br>
                   <select name="sec" required class="input3">
                   <?php
                       $sl="SELECT DISTINCT (CSEC) FROM class";
                        $r=$db->query($sl);
                       if($r->num_rows>0)
                       {
                           echo"<option vlaue=''>Select</option>";
                           while($ro=$r->fetch_assoc())
                           {
                                echo"<option vlaue='{$ro["CSEC"]}'>{$ro["CSEC"]}</option>";
                           }
                        } 
                    ?>
                    </select><br><br>

                </div>  
                <button type="submit" class="btn"  name="view">View Details</button>
                </form>
                <br>
                <div class="Output">
                  <?php
                     if(isset($_POST["view"]))
                     {
                        echo "<h3>Student Details</h3><br>"
                        $sql="select * from student where SCLASS='{$_POST["cla"]}' and SSEC='{$_POST["sec"]}'";
                        $re=$db->query($sql);
                        if($re->num_rows>0)
                        {
                            echo'
                            <table border="1px" >
                            <tr>
                               <th>S.No</th>
                               <th>Roll No</th>
                               <th>Name</th>
                               <th>Father's Name</th>
                               <th>DOB</th>
                               <th>Gender</th>
                               <th>Phone</th>
                               <th>Mail</th>
                               <th>Address</th>
                               <th>Class</th>
                               <th>Sec</th>
                               <th>Image</th>
                               <th>Delete</th>
                            </tr> 
                            ';
                            $i=0;
                            while($r=re->fetch_assoc())
                            {
                                $i++;
                                echo "
                                <tr>
                                 <td>{$i}</td>
                                 <td>{$r["RNO"]}</td>
                                 <td>{$r["NAME"]}</td>
                                 <td>{$r["FNAME"]}</td>
                                 <td>{$r["DOB"]}</td>
                                 <td>{$r["GEN"]}</td>
                                 <td>{$r["PHO"]}</td>
                                 <td>{$r["MAIL"]}</td>
                                 <td>{$r["ADDR"]}</td>
                                 <td>{$r["SCLASS"]}</td>
                                 <td>{$r["SSEC"]}</td>
                                 <td><img src='{$r["SIMG"]}' height='70' weight='70'</td>
                                 <td><a href='stud_delete.php?id={$r["ID"]}' class='btnr'>Delete</a></td>
                                 
                                </tr> 
                                "; 
                            }
                            
                        }
                        else
                        {
                            echo"No Record Found";
                        }
                        echo"</table>"
                        
                     }
                  ?>

                </div>
               
            </div> 

       </div> 
       <?php include"footer.php";?> 
    <body>
</html>             