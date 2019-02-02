<!DOCTYPE html>
<?php
 session_start();
 $con=mysqli_connect("localhost","root","","voting_system");
 
 if(!$_SESSION['admin_email']){
     header("location: login.php");//redirectthe user to another page
 }
 else{
    $v=$_SESSION['admin_email'];
    $sl="select * from admin where admin_email='$v'";
        $run_sl=mysqli_query($con,$sl);

        $row2=mysqli_fetch_array($run_sl);
            $id=$row2['admin_id'];
            $an=$row2['admin_name'];
            $ae=$row2['admin_email'];
            $ap=$row2['admin_pass'];
            $im=$row2['imag'];
            $cn=$row2['country'];
            $pn=$row2['phone'];
            $gn=$row2['gender'];
            $adr=$row2['addr'];
            $bd=$row2['b_day'];


            
            
?>

<html>
<head>
    <title>Admin Profile</title>
</head>
<style>
          body{
                margin:0px;
                border: 0px;
            }
            #header{
                width:100%;
                height:120px;
                background:#2c3e50;
                color: white;
            }
            #sidebar{
                width:300px;
                height:400px;
                background:#27ae6D;
                float:left;
            }
            #data{
                padding: 50px;
                height:1000;
                background:#7f8c8d;
                font-family: Helvetica;
                font-size: 25px;
            }
            #AdminLogo{
                border-radius: 50%;
                height: 160px;
                width: 200px;
            }
           ul li{
               padding: 20px;
               border-bottom: 2px solid grey;
               color: white;
           }
           ul li:hover{
               background: #cD392b;
               color: white;
           }

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
<div id="header">
           <center><img src="vImage\admn.png" alt="adminlogo" id="AdminLogo"><br/>
           
        </div>
        <div id="sidebar">
            <ul>
                <li><a href="admin.php" target="_self">Home</a></li>
                <li><a href="profile.php" target="_self">Profile</a></li>
                <li><a href="usersInfo.php" target="_self">Users Info</a></li>
                <li><a href="candidatesInfo.php" target="_self">Candidates Info</a></li>
                <li><a href="result.php" target="_self">Voting Results</a></li>
                <li><a href="logout.php" target="_self">Log Out</a></li>
            </ul>
        </div>
        
        
        <div id="data">
        <center><h3>Admin's Profile</h3>
   
        <form method="post" action="profile.php" enctype="multipart/form-data">
        <table align="center" bgcolor="gray" width="500">
        <tr align="center">
        <td colspan="8"><h2>Update Your Profile</h2></td>
        </tr>
        <tr>
        <td align="right"><strong>Name:</strong></td>
        <td>
        <input type="text" name="admin_name"  value="<?php echo $an;?>"/><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Email:</strong></td>
        <td>
        <input type="text" name="admin_email"  value="<?php echo $ae;?>" /><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Password:</strong></td>
        <td>
        <input type="password" name="admin_pass" id="myInput" value="<?php echo $ap;?>"/>
        </td>
        <td colspan="2">
        <!-- An element to toggle between password visibility -->
        <input type="checkbox" onclick="myFunction()">Show Password</br>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Country:</strong></td>
        <td>
            <select name="country" value="<?php echo $cn;?>">
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
        <td align="right"><strong>Phone No:</strong></td>
        <td>
        <input type="text" name="phone" value="<?php echo $pn;?>"/><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Address:</strong></td>
        <td>
           <!-- <textarea name="address" value="<?php //echo $adr;?>"cols="30" rows="5"></textarea>-->
           <input type="text" name="address" value="<?php echo $adr;?>"/><br/>

       </td>
        </tr>
        <tr>
        <td align="right"><strong>Gender:</strong></td>
        <td>
        Male:<input type="radio" name="gender" value="Male"/><br/>
        Female:<input type="radio" name="gender" value="Female"/><br/>    
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Birthday:</strong></td>
        <td>
        <input type="date" name="b_day" value="<?php echo $bd;?>"/><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Image:</strong></td>
        <td>
       <input type="file" name="ad_image" value="<?php echo $im;?>"/><br/>
        </td>
        </tr>
    
        <tr align="center">
        <td colspan="6"></td>
        <td>
        <input type="submit" name="update_ad" value="Update Profile"/></br>
        </td>
        </tr>
        
    </table>
    </form>

    <br/>

    <?php include('ad_datashow.php');?>
    
    <script>
        function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>

<?php
    if(isset($_POST['update_ad'])){
        $name=$_POST['admin_name'];
        $email=$_POST['admin_email'];
        $pass=$_POST['admin_pass'];
        $country=$_POST['country'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $gender=$_POST['gender'];
        $b_day=$_POST['b_day'];

        //getting the image details in saving in local image
        $ad_image=$_FILES['ad_image']['name'];
        $ad_tmp=$_FILES['ad_image']['tmp_name'];
        
        //to prevent mysql injection
          $name=stripcslashes($name);
          $pass=stripcslashes($pass);
          $email=stripcslashes($email);
          $coutry=stripcslashes($country);
          $phone=stripcslashes($phone);
          $address=stripcslashes($address);
          $gender=stripcslashes($gender);
          $b_day=stripcslashes($b_day);
          $ad_image=stripcslashes($ad_image);
  
          //stop the script when any invalid data input given
          $name = mysqli_real_escape_string($con, $name);
          $pass = mysqli_real_escape_string($con, $pass);
          $email = mysqli_real_escape_string($con, $email);
          $country = mysqli_real_escape_string($con, $country);
          $phone = mysqli_real_escape_string($con, $phone);
          $address = mysqli_real_escape_string($con, $address);
          $gender = mysqli_real_escape_string($con, $gender);
          $b_day= mysqli_real_escape_string($con, $b_day);
          $ad_image = mysqli_real_escape_string($con, $ad_image);

    
        if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Your email is not valid!')</script>";
            exit();
        }
        
        if(!empty($first) && strlen($pass)<8){
            echo "<script>alert('Please select a password of 8 letters minimum!')</script>";
            exit();
        }

        $sel_eml="select * from users where email='$email'";
        $run_eml=mysqli_query($con,$sel_eml);
        $check_eml=mysqli_num_rows($run_eml);

        if($check_eml==1){
            echo "<script>alert('This email is registered as user, try another one!')</script>";
            exit();
        }

        else{
        $_SESSION['admin_email']=$email;//login
        
        //move_uploaded_file($ad_tmp,"upld\".$ad_image");
        $target="upld/".basename($ad_image);

        if(move_uploaded_file($ad_tmp, $target)){
            $msg = "Image uploaded successfully";
        }
        else{
            $msg = "Failed to upload image";
        }

       

        if(!empty($name)&&!empty($email) &&!empty($pass) &&!empty($phone) &&!empty($country) &&!empty($address) 
        &&!empty($gender) &&!empty($b_day) &&!empty($ad_image))
       { 
        $updateAd="UPDATE admin SET admin_name='$name',admin_email='$email',admin_pass='$pass',country='$country',phone='$phone', addr='$address',gender='$gender',
        b_day='$b_day',imag='$ad_image',update_date=NOW() WHERE admin_id='$id'";

        $run=mysqli_query($con,$updateAd);

            if($run){
                echo "<center><h3>Profile Updated Successfully!</h3>";
                echo "<script>window.open('profile.php','_self')</script>";
            }
        }
        else{
            echo "<center><h3>Please fill up all the fields!</h3>";
        }
        }
    }
    ?>
 </div>
        </div>

    </bdoy>
</html>

<?php } ?>
