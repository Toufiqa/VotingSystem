<!DOCTYPE html>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","voting_system");
    
    if(!$_SESSION['admin_email']){
        header("location: login.php");//redirectthe user to another page
    }
    else{
       
?>

<html>
    <head>
        <title>Admin Panel</title>
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
                height:700px;
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
            <center><h3>Welcome To The Admin Panel!</h3>
            <p>Have a good day!</p>

            </div>
        </div>

    </bdoy>
</html>

<?php } ?>