<?php

    include "database.php" ;
    session_start();
    if(!isset($_SERVER["AID"]))
    {
        echo "<script>window.open('teacher_login.php?mes=Access Denied..','_self');</script>";
    }
   
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>handle class</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php include "navbar.php";?><br>
        <div id="section">
            <?php include"sidebar.php";?><br><br><br>
                <h3 class= "text">Welcome<?php echo $_SESSION["ANAME"];?></h3><br><hr><br>
            <div class="content">
                <h3>Add Classes</h3><br>
                <div class="lbox1">
                <?php
                    if(isset($_POST["submit"]))
                    {
                       $sq="insert into hclass(TID,CLA,SEC,SUB) values('{$_SERVER["TID"]}','{$_POST["cla"]}','{$_POST["sec"]}','{$_POST["sub"]}')";
                       if($db->query($sq))
                        {
                           echo "<div class='success'>Insert Success..</div>";
                        }   
        
                       else
                       {
                          echo "<div class='error'>Insert failed..</div>";
                       }
                    }
                  
                    
                   
                ?>


                <form method="post" action= "<?php echo $_SERVER ["PHP_SELF"];?>">
                    <label>Class</label><br>
                        <select name="cla" required class="input3"><br><br>
                            <?php
                                $sl="select DISTINCT(CNAME) from class";
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
                        </select><br><br>

                    <label>Section</label><br>
                        <select name="sec" required class="input3"><br><br>
                        <?php
                                $sl="select DISTINCT(CSEC) from class";
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

                    <label>Subject</label><br>
                        <select name="sub" required class="input3"><br><br>
                        <?php
                                $s="select * from sub";
                                $r=$db->query($s);
                                if($r->num_rows>0)
                                { 
                                    echo"<option vlaue=''>Select</option>";
                                    while($r=$re->fetch_assoc())
                                    {
                                        echo"<option vlaue='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
                                    }

                                }
                            ?>
                        </select><br><br>
                    
                    <button type="submit" class="btn" name="submit">Add Details</button>
                </form>
                   
                </div>
                <div class="rbox1"></div>
                <h3>Details</h3>
                    <?php
                        if(isset($_GET["mes"]))
                        {
                            echo "<div class='error'>{$_GET["mes"]}</div>";
                        }
                    ?>
                    <table border="1px">
                       <tr>
                          <th>S.No</th>
                          <th>Class Name</th>
                          <th>Section</th>
                          <th>Subject</th>
                          <th>Delete</th>
                       </tr> 
                       <?php
                            $s="select * from hclass";
                            $res=$db->query($s);
                            if($res->num_rows>0)
                            {
                                $i=0;
                                while($r=$res->fetch_assoc())
                                $i++;
                                echo"<tr>
                                    <td>{$i}</td>
                                    <td>{$r["CLA"]}</td>
                                    <td>{$r["SEC"]}</td>
                                    <td>{$r["SUB"]}</td>
                                    
                                    <td><a href='hclass_delete.php?id={$r["HID"]}' class='btnr'>Delete</a></td>
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
        </div>
          <?php include"footer.php";?>  
    </body>
</html>  
