<?php
$con=mysqli_connect("localhost","root","","voting_system") or die("Connection was not created");

?>
<html>
<body>
         <?php
                if(isset($_GET['edit'])){
                    
                    $edit_id=$_GET['edit'];
                    $edit="select * from cand_info where cand_id=$edit_id";
                    
                    $run_edit=mysqli_query($con,$edit);

                    $row=mysqli_fetch_array($run_edit);
                    
                    $cand_id=$row['cand_id'];
                    $cand_name=$row['cand_name'];
                    $cand_image=$row['cand_image'];
                    $cand_email=$row['cand_email'];
                    $cand_gender=$row['cand_gender'];
                    $cand_bday=$row['cand_bday'];
                    $cand_country=$row['cand_country'];
                    $cand_update=$row['cand_update'];

                }

            ?>

        <br/>

        <form method="post" action="" enctype="multipart/form-data">
        <table align="center" bgcolor="gray" width="500">
        <tr align="center">
        <td colspan="8"><h2>Update Candidates Info</h2></td>
        </tr>
        <tr>
        <td align="right"><strong>Name:</strong></td>
        <td>
        <input type="text" name="c_name"  value="<?php echo $cand_name;?>"/><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Email:</strong></td>
        <td>
        <input type="text" name="c_email"  value="<?php echo $cand_email;?>" /><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Country:</strong></td>
        <td>
            <select name="c_country" value="<?php echo $cand_country;?>">
                <option>Select a Country</option>
                <option>Bangladesh</option>
                <option>Japan</option>
                <option>Canada</option>
                <option>Korea</option>
                <option>UK</option>
                <option>USA</option>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Gender:</strong></td>
        <td>
        Male:<input type="radio" name="c_gender" value="Male"/><br/>
        Female:<input type="radio" name="c_gender" value="Female"/><br/>    
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Birthday:</strong></td>
        <td>
        <input type="date" name="c_bday" value="<?php echo $cand_bday;?>"/><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Image:</strong></td>
        <td>
       <input type="file" name="c_image" value="<?php echo"<img src='upld/".$cand_image."'>";?>"/><br/>
        </td>
        </tr>
    
        <tr align="center">
        <td colspan="6"></td>
        <td>
        <input type="submit" name="update_cand" value="Update Data"/></br>
        </td>
        </tr>
        
    </table>
            </form>

        <?php
            /*if(isset($_POST['update_cand'])){
                $updated_name=$_POST['c_name'];
            // $updated_pass=$_POST['u_pass'];
                $updated_email=$_POST['c_email'];
                //$update="UPDATE users SET name='$updated_name', pass= '$updated_pass', email= '$updated_email' WHERE id='$edit_id'";
                $update="UPDATE users SET name='$updated_name', email= '$updated_email' WHERE id='$edit_id'";
                $run_update = mysqli_query($con,$update);

                if($run_update){
                    echo "<script>alert(' A user has been successfully updated!')</script>";//pop-up massage in js
                    echo "<script>window.open('usersInfo.php','_self')</script>";//refresh the page in js
                }
            }*/
        ?>

        <?php

        if(isset($_POST['update_cand'])){
        $updated_name=$_POST['c_name'];
        $updated_email=$_POST['c_email'];
        $updated_country=$_POST['c_country'];
        $updated_gender=$_POST['c_gender'];
        $updated_bday=$_POST['c_bday'];

        //getting the image details in saving in local image
        $updated_image=$_FILES['c_image']['name'];
        $updated_tmp=$_FILES['c_image']['tmp_name'];
        
        //to prevent mysql injection
          $updated_name=stripcslashes($updated_name);
          $updated_email=stripcslashes($updated_email);
          $updated_coutry=stripcslashes($updated_country);
          $updated_gender=stripcslashes($updated_gender);
          $updated_bday=stripcslashes($updated_bday);
          $updated_image=stripcslashes($updated_image);
  
          //stop the script when any invalid data input given
          $updated_name = mysqli_real_escape_string($con, $updated_name);
          $updated_email = mysqli_real_escape_string($con, $updated_email);
          $updated_country = mysqli_real_escape_string($con, $updated_country);
          $updated_gender = mysqli_real_escape_string($con, $updated_gender);
          $updated_bday= mysqli_real_escape_string($con, $updated_bday);
          $updated_image = mysqli_real_escape_string($con, $updated_image);

    
        if(!empty($updated_email) && !filter_var($updated_email, FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('This email is not valid!')</script>";
            exit();
        }
       

        if(!empty($updated_name)&&!empty($updated_email) &&!empty($updated_country) 
        &&!empty($updated_gender) &&!empty($updated_bday) &&!empty($updated_image))
       { 
            //move_uploaded_file($updated_tmp,"upld/".$updated_image);
            $target="upld/".basename($updated_image);

        if(move_uploaded_file($updated_tmp, $target)){
            $msg = "Image uploaded successfully";
        }
        else{
            $msg = "Failed to upload image";
        }
            $updateCand="UPDATE cand_info SET cand_name='$updated_name',cand_email='$updated_email',cand_country='$updated_country',cand_gender='$updated_gender',
            cand_bday='$updated_bday',cand_image='$updated_image',cand_update=NOW() WHERE cand_id='$cand_id'";

            $run_update=mysqli_query($con,$updateCand);

        if($run_update){
            echo "<script>alert(' A candidate has been successfully updated!')</script>";//pop-up massage in js
            echo "<script>window.open('candidatesInfo.php','_self')</script>";//refresh the page in js
        }
        }
        else{
            echo "<script>alert('Please fill up all the fields!')</script>";
        }
    }

        ?>
    </body>
</html>