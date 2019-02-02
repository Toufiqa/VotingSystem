<!DOCTYPE html>
<?php
session_start();
$con=mysqli_connect("localhost","root","","voting_system") or die("Connection was not created");
?>
<html>
<head>
    <title>Sign Up</title>
</head>
<style>
body{
    padding:0;
    margin:0;
    background: skyblue;
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
    <form method="post" action="sign_up.php" enctype="multipart/form-data">
    <table align="center" bgcolor="gray" width="500">
        <tr align="center">
        <td colspan="8"><h2>New User? Register Here!</h2></td>
        </tr>
        <tr>
        <td align="right"><strong>Name:</strong></td>
        <td>
        <input type="text" name="name" placeholder="Write your name" required="required"/><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Email:</strong></td>
        <td>
        <input type="text" name="email" placeholder="Write your email" required="required"/><br/>
        </td>
        </tr>
        <tr>
        <td align="right"><strong>Password:</strong></td>
        <td>
        <input type="password" name="pass" placeholder="Write your password" required="required"/><br/>
        </td>
        </tr>
     <!--<td align="right"><strong>Confirm Password:</strong></td>
        <td>
        <input type="password" name="conpass" placeholder="Write again your password" required="required"/><br/>
        </td>
        </tr>-->
        <tr align="center">
        <td colspan="6"></td>
        <td>
        <input type="submit" name="sign" value="Sign Up"/></br>
        </td>
        </tr>
       <!-- <tr align="center">
        <td colspan="6"></td>
        <td>
        <a href="login.php"><button>Log In</button></a>
        </td>
        </tr>-->
        
    </table>
    </form>

   <!--<center><h3>Already Registered? <a href="log_in.php">Log In Here!</a></h3>-->
   <center><h3>Already Registered? <a href="login.php">Log In Here!</a></h3>

<?php
    if(isset($_POST['sign'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        //$conpass=$_POST['conpass'];

        /*if ($_POST['pass'] != $_POST['conpass'])  {
            echo "<script>alert('Password doesn't match! Please try again!')</script>";
            exit();
        } */
        //to prevent mysql injection
          $name=stripcslashes($name);
          $pass=stripcslashes($pass);
          //$conpass=stripcslashes($conpass);
          $email=stripcslashes($email);
  
          //stop the script when any invalid data input given
          $name = mysqli_real_escape_string($con, $name);
          $pass = mysqli_real_escape_string($con, $pass);
          //$conpass = mysqli_real_escape_string($con, $conpass);
          $email = mysqli_real_escape_string($con, $email);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('Your email is not valid!')</script>";
            exit();
        }
        
        if(strlen($pass)<8){
            echo "<script>alert('Please select a password of 8 letters minimum!')</script>";
            exit();
        }

        $sel_eml="select * from users where email='$email'";
        $run_eml=mysqli_query($con,$sel_eml);
        $check_eml=mysqli_num_rows($run_eml);

        if($check_eml==1){
            echo "<script>alert('This email is already registered, try another one!')</script>";
            exit();
        }

        else{
        $_SESSION['email']=$email;//login

        //move_upload_file('user_tmp',"images/user_image");
        $insert="insert into users (name,pass,email) values ('$name','$pass','$email')";
        $run=mysqli_query($con,$insert);

            if($run){
                echo "<center><h3>Registration Successful! Welcome!</h3>";
                echo "<script>window.open('login.php','_self')</script>";
                //echo "<script>window.open('log_in.php','_self')</script>";
            }
        }
    }
?>

</body>
</html>
