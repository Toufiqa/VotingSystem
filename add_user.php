<!DOCTYPE html>
<?php
//session_start();
$con=mysqli_connect("localhost","root","","voting_system") or die("Connection was not created");
?>
<html>
<head>
    <title>Add New User</title>
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
    <form method="post" action="sign_up.php" enctype="multipart/form-data">
    <table align="center" bgcolor="gray" width="500">
        <tr align="center">
        <td colspan="8"><h2>Add New User</h2></td>
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
        <input type="password" name="pass"  value="<?php echo $p='12345678';?>" id="myInput"/><br/>
        </td>
        </tr>
        <tr>
        <td align="right" colspan="2">
        <!-- An element to toggle between password visibility -->
        <input type="checkbox" onclick="myFunction()">Show Password</br>
        </td>
        </tr>
        <tr align="center">
        <td colspan="6"></td>
        <td>
        <input type="submit" name="sign" value="Add User"/></br>
        </td>
        </tr>
           
    </table>
    </form>

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
    if(isset($_POST['sign'])){
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

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>alert('This email is not valid!')</script>";
            exit();
        }
        
        if(strlen($pass)<8){
            echo "<script>alert('Please give a password of 8 letters minimum!')</script>";
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
        $insert="insert into users (name,pass,email) values ('$name','$pass','$email')";
        $run=mysqli_query($con,$insert);

            if($run){
                echo "<script>alert('Registration Successful!')</script>";
                echo "<script>window.open('usersInfo.php','_self')</script>";
            }
        }
    }
?>

</body>
</html>
