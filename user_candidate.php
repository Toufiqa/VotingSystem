<!DOCTYPE html>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","voting_system");
    
    if(!$_SESSION['email']){
        header("location: login.php");//redirectthe user to another page
    }
    else{
       
?>

<html>
    <head>
        <title>USer Panel</title>
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
                height:1500px;
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

        </style>
    </head>
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
            <center><h3>Candidates Info</h3>
            <?php include('user_can_see.php'); ?>
            

            </div>
        </div>

    </bdoy>
</html>

<?php } ?>