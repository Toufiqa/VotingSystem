<!DOCTYPE html>
<?php
 session_start();
 $con=mysqli_connect("localhost","root","","voting_system");
 
 if(!$_SESSION['email']){
     header("location: login.php");//redirectthe user to another page
 }
 else{
    $v=$_SESSION['email'];
    //data fetch by email
    $sl="select * from users where email='$v'";
        $run_sl=mysqli_query($con,$sl);

        $row2=mysqli_fetch_array($run_sl);
            $id=$row2['id'];
            $an=$row2['name'];
            $ae=$row2['email'];
            $ap=$row2['pass'];
            
            
?>

<html>
<head>
    <title>User Panel</title>
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
           <center><img src="vImage\user1.png" alt="userlogo" id="AdminLogo"><br/>
           
        </div>
        <div id="sidebar">
            <ul>
                <li><a href="userPanel.php" target="_self">Home</a></li>
                <li><a href="userProfile.php" target="_self">Profile</a></li>
                <li><a href="user_candidate.php" target="_self">Candidates Info</a></li>
                <li><a href="online_voting1.php" target="_self">Online Voting</a></li>
                <li><a href="logout.php" target="_self">Log Out</a></li>
            </ul>
        </div>

        <div id="data">

        <center><h3><?php echo $an."'s "?>Profile</h3>
   
        <form method="post" action="userProfile.php" enctype="multipart/form-data">
        <table align="center" bgcolor="gray" width="500">
        <tr align="center">
        <td colspan="8"><h2>Update Your Profile</h2></td>
        </tr>
        <tr>
        <td align="right"><strong>Name:</strong></td>
        <td>
        <input type="text" name="name"  value="<?php echo $an;?>"/><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Email:</strong></td>
        <td>
        <input type="text" name="email"  value="<?php echo $ae;?>" /><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Password:</strong></td>
        <td>
        <input type="password" name="pass"  value="<?php echo $ap;?>"/><br/>
        </td>
        </tr>
        <tr align="center">
        <td colspan="6"></td>
        <td>
        <input type="submit" name="update_up" value="Update Profile"/></br>
        </td>
        </tr>
    
        
    </table>
    </form>
    <br/>
    <br/>

<?php
    if(isset($_POST['update_up'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];

        
        //to prevent mysql injection
          $name=stripcslashes($name);
          $pass=stripcslashes($pass);
          $email=stripcslashes($email);
  
          //stop the script when any invalid data input given
          $name = mysqli_real_escape_string($con, $name);
          $pass = mysqli_real_escape_string($con, $pass);
          $email = mysqli_real_escape_string($con, $email);

    
        if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Your email is not valid!')</script>";
            exit();
        }
        
        if(!empty($first) && strlen($pass)<8){
            echo "<script>alert('Please select a password of 8 letters minimum!')</script>";
            exit();
        }

        /*
        $sel_eml="select * from users where email='$email'";
        $run_eml=mysqli_query($con,$sel_eml);
        $check_eml=mysqli_num_rows($run_eml);

        

        $sel_eml1="select * from admin where admin_email='$email'";
        $run_eml1=mysqli_query($con,$sel_eml1);
        $check_eml1=mysqli_num_rows($run_eml1);*/

      
        $_SESSION['email']=$email;//login
        
        //move_upload_file('user_tmp',"images/user_image");

       

        if(!empty($name)&&!empty($email) &&!empty($pass))
       { 
        $updateAd="UPDATE users SET name='$name',email='$email',pass='$pass' where id='$id'";

        $run=mysqli_query($con,$updateAd);

            if($run){
                echo "<center><h3>Your Profile Is Updated! Thank You!</h3>";
                echo "<script>window.open('userProfile.php','_self')</script>";
                //echo "<script>window.open('log_in.php','_self')</script>";
            }
        }
        else{
            echo "<center><h3>Please fill up all the fields!</h3>";
        }
        }
    
    ?>
    <?php include('user_dataShow.php');?> 
 </div>
        </div>

    </bdoy>
</html>

<?php } ?>
