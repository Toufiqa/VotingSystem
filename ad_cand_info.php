<!DOCTYPE html>
<?php
//session_start();
$con=mysqli_connect("localhost","root","","voting_system") or die("Connection was not created");
?>
<html>
<head>
    <title>Admin Panel</title>
</head>
<style>
table{
    color:white;
    padding:10px;
    width:400px;
}
input{
    padding:5px;
}
</style>
<body>
    <form method="post" action="" enctype="multipart/form-data">
    <table align="center" bgcolor="gray" width="500">
        <tr align="center">
        <td colspan="8"><h2>Add New Candidate</h2></td>
        </tr>
        <tr>
        <td align="right"><strong>Name:</strong></td>
        <td>
        <input type="text" name="cand_name" placeholder="Write candidate's name" required="required"/><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Email:</strong></td>
        <td>
        <input type="text" name="cand_email" placeholder="Write candidate's email" required="required"/><br/>
        </td>
        </tr>
       
        <tr>
        <td align="right"><strong>Country:</strong></td>
        <td>
            <select name="cand_country" value="<?php echo $cn;?>">
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
        Male:<input type="radio" name="cand_gender" value="Male"/><br/>
        Female:<input type="radio" name="cand_gender" value="Female"/><br/>    
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Birthday:</strong></td>
        <td>
        <input type="date" name="cand_bday" value="<?php echo $bd;?>"/><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Image:</strong></td>
        <td>
       <input type="file" name="cand_image" value="<?php echo $im;?>"/><br/>       
        </td>
        </tr>
    
        <tr align="center">
        <td colspan="6"></td>
        <td>
        <input type="submit" name="add_cand" value="Add Candidate"/></br>
        </td>
        </tr>
       
        
    </table>
    </form>

<?php
    if(isset($_POST['add_cand'])){
        $name=$_POST['cand_name'];
        $email=$_POST['cand_email'];
        $country=$_POST['cand_country'];
        $gender=$_POST['cand_gender'];
        $b_day=$_POST['cand_bday'];

        //getting the image details in saving in local image
        $cand_image=$_FILES['cand_image']['name'];
        $cand_tmp=$_FILES['cand_image']['tmp_name'];
        
        //to prevent mysql injection
          $name=stripcslashes($name);
          $email=stripcslashes($email);
          $coutry=stripcslashes($country);
          $gender=stripcslashes($gender);
          $b_day=stripcslashes($b_day);
          $cand_image=stripcslashes($cand_image);
  
          //stop the script when any invalid data input given
         $name = mysqli_real_escape_string($con, $name);
          $email = mysqli_real_escape_string($con, $email);
          $country = mysqli_real_escape_string($con, $country);
          $gender = mysqli_real_escape_string($con, $gender);
          $b_day= mysqli_real_escape_string($con, $b_day);
          $cand_image = mysqli_real_escape_string($con, $cand_image);

    
        if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('This email is not valid!')</script>";
            exit();
        }
        

        $sel_eml="select * from cand_info where cand_email='$email'";
        $run_eml=mysqli_query($con,$sel_eml);
        $check_eml=mysqli_num_rows($run_eml);

        if($check_eml==1){
            echo "<script>alert('This email is already registered, try another one!')</script>";
            exit();
        }

        else{
        //$_SESSION['email']=$email;//login
        //temporary name of image,"folder/real image name"
        //move_uploaded_file($cand_tmp,"upld\".$cand_image");
        $target="upld/".basename($cand_image);

        if(move_uploaded_file($cand_tmp, $target)){
            $msg = "Image uploaded successfully";
        }
        else{
            $msg = "Failed to upload image";
        }
       

        if(!empty($name)&&!empty($email) &&!empty($country) 
        &&!empty($gender) &&!empty($b_day) &&!empty($cand_image))
       { 
        $insertCand="insert into cand_info (cand_name,cand_image,cand_gender,cand_country,cand_bday,cand_email,cand_update) values('$name','$cand_image','$gender','$country','$b_day','$email',NOW())";

        $run=mysqli_query($con,$insertCand);

            if($run){
                echo "<center><h3>Candidate Added Successfully!</h3>";
                echo "<script>window.open('candidatesInfo.php','_self')</script>";
            }
        }
        else{
            echo "<center><h3>Please fill up all the fields!</h3>";
        }
        }
    }
    ?>

</body>
</html>
