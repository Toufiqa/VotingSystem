<?php
    //connect to the server and select database
    mysql_connect("localhost","root","");
    mysql_select_db("voting_system");
    include('login.php');

    $host='localhost';
    $user='root';
    $pass='';
    $db='voting_system';
    $con=mysqli_connect($host,$user,$pass,$db);

    if(!$con){
        echo 'Database not connected';
    }
?>
<--<?php
    //get values from login.php
    /*$username = $_POST['username'];
    $password = $_POST['password'];

    //to prevent mysql injection
    $username=stripcslashes($username);
    $password=stripcslashes($password);
    $username=mysql_real_escape_string($username);
    $password=mysql_real_escape_string($password);

    //query the database
    $result=mysql_query("select * from login where uname='$username' and password='$password'")
    or die("Failed to query database".mysql_error());

    $row=mysql_fetch_array($result);
    if ($row['uname']==$username && $row['password']==$password ){
        echo "Login successful!!! Welcome ".$row['id'];
        //redirecting to another page
       //header( 'Location: online_voting.php' );
    } else {
        echo "Failed to login!";
        echo '<a href="login.php">Try again</a>', "\n";
    }*/
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $pass=$_POST['pass'];

        //to prevent mysql injection
        /*$pass=stripcslashes($pass);
        $email=stripcslashes($email);
  
        //stop the script when any invalid data input given
        $pass = mysqli_real_escape_string($con, $pass);
        $email = mysqli_real_escape_string($con, $email);*/

        /* Return the number of rows in result set
        $rowcount=mysqli_num_rows($result);
        printf("Result set has %d rows.\n",$rowcount);*/

        $sel = "select * from users where email='$email' AND pass='$pass'";
        $run=mysqli_query($con,$sel);
        $check=mysqli_num_rows($run);

        //admin email check
        $sel1 = "select * from admin where admin_email='$email' AND admin_pass='$pass'";
        $run1=mysqli_query($con,$sel1);
        $check1=mysqli_num_rows($run1);

        if($check==0 && $check1==0){
            echo "<script>alert('Password or email is not correct! Please try again!')</script>";
            exit();
        }

        else{
            /*($check1==1){
                session_start();
                $_SESSION['admin_email']=$email;//login
                echo "<script>alert('Welcome!')</script>";
                echo "<script>window.open('admin.php','_self')</script>";
            }*/

            if($check1==1){
                session_start();
                $_SESSION['admin_email']=$email;//login
                echo "<script>alert('Welcome!')</script>";
                echo "<script>window.open('admin.php','_self')</script>";
            }
            
            if($check==1){
            session_start();
            $_SESSION['email']=$email;//login
            $ins_log="insert into login (uemail,password) values ('$email','$pass')";
            $run_inslog=mysqli_query($con,$ins_log);
            if($run_inslog){
            echo "<script>alert('Welcome!')</script>";
            echo "<script>window.open('userPanel.php','_self')</script>";
            }

        }
        }
    }
?>