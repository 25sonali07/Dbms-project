<? php
     
    include "database.php" ;
    session_start();
    if(isset($_POST["login"]))
              {
                  sql="SELECT * from staff where TID='{ $_SESSION["TID"]}' ";
                  $res=$db->query($sql);
                  if($res->num_rows>0)
                  {
                      $row=$res->fetch_assoc();

                    
                  }

              }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>teacher homr</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>

        <?php include "navbar.php";?><br>
        <img src="#" style="margin-left:90px;" class="sha">

        <div id="section">
                <?php include"sidebar.php";?><br><br><br>
                <h3 class= "text">Welcome<?php echo $_SESSION["ANAME"];?></h3><br><hr><br>
            <div class="content">
                <h3>Add Profile</h3><br>
                <div class="lbox1">
                <?php
                    if(isset($_POST{"submit"}))
                    {
                        $target="staff/";
                        $target_file=$target.basename($_FILES["img"]["name"])

                        if(move_uploaded_file($_FILES['img'],['tmp_name'].$target_file))
                        {
                            $sql="update staff set PNO='{$_POST["pno"]}',MAIL='{$_POST["mail"]}',PADDR='{$_POST["addr"]}''IMG='{$target_file}'where TID=$_SESSION["TID"]}'";
                            $dp->query($sql);
                            echo "<div class='success'>Insert Success..</div>";
                        }
                          
                       
                    }
                ?>

                <form enctype="multipart/form-data" role="form" method="post"  action= "<?php echo $_SERVER ["PHP_SELF"];?>">
                    <label>Phone No</label><br>
                    <input type="text" maxlength="10" required class="input3" name="pno"><br><br>
                    <label>Address</label><br>
                    <textarea rows="5"  name="addr"></textarea><br><br>
                    <label>E-Mail</label><br>
                    <input type="email"  class="input3" required name="mail"><br><br>
                    <label>Image</label><br>
                    <input type="file"  class="input3" required name="img"><br><br>
                    <button type="submit" class="btn"  name="submit">Add Profile Details</button>
                </form>
            </div>
            <div class="rbox1">
            <h3>Profile</h3><br>
                <table border="1px">
                    <tr><td colspan="2"><img src="<?php echo $row["IMG"] ?>" height="100" width="100" alt="upload Pending"></td></tr>
                    <tr><th>Name</th><td><?php echo $row["TNAME"] ?></td></tr>
                    <tr><th>Qualification</th><td><?php echo $row["QUAL"] ?></td></tr>
                    <tr><th>Salary</th><td><?php echo $row["SAL"] ?></td></tr>
                    <tr><th>Phone No</th><td><?php echo $row["PNO"] ?></td></tr>
                    <tr><th>E-mail</th><td><?php echo $row["MAIL"] ?></td></tr>
                    <tr><th>Address</th><td><?php echo $row["PADDR"] ?></td></tr>
                          
               </table> 
            </div>
        </div>
    </body>
</html>    
