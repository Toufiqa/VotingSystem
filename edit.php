<?php
$con=mysqli_connect("localhost","root","","voting_system") or die("Connection was not created");

?>
<html>
<body>
  <?php
                if(isset($_GET['edit'])){

                    $edit_id=$_GET['edit'];
                    $edit="select * from users where id=$edit_id";
                    $run_edit=mysqli_query($con,$edit);

                    $row=mysqli_fetch_array($run_edit);
                    
                        $user_name=$row['name'];
                    // $user_pass=$row['pass'];
                        $user_email=$row['email'];

                }

            ?>

        <br/>
        <?php// include('usersInfo.php'); ?>
        <form method="post" action="">
                <input type="text" name="u_name" value="<?php echo $user_name;?>"/><br/>
            <!-- <input type="text" name="u_pass" value="<?php// echo $user_pass;?>"/><br/>-->
                <input type="text" name="u_email" value="<?php echo $user_email;?>"/><br/>
                <input type="submit" name="update" value="Update Data"/></br>
            </form>

        <?php
            if(isset($_POST['update'])){
                $updated_name=$_POST['u_name'];
            // $updated_pass=$_POST['u_pass'];
                $updated_email=$_POST['u_email'];
                //$update="UPDATE users SET name='$updated_name', pass= '$updated_pass', email= '$updated_email' WHERE id='$edit_id'";
                $update="UPDATE users SET name='$updated_name', email= '$updated_email' WHERE id='$edit_id'";
                $run_update = mysqli_query($con,$update);

                if($run_update){
                    echo "<script>alert(' A user has been successfully updated!')</script>";//pop-up massage in js
                    echo "<script>window.open('usersInfo.php','_self')</script>";//refresh the page in js
                }
            }
        ?>
    </body>
</html>