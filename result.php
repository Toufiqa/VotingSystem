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
           #con{
            margin: auto;
            width: 1000px;
            padding:10px;
            background-color: purple;
        }
        #candidates{
            width:1000px;
            margin:auto;
        }
        #candidates img{
            border: px solid orange;
            border-radius:100px;
            padding:5px;
        }
        form input{
            padding:10px;
            margin:65px;
        }
        h2{
            color:white;
        }
        .button {
            background-color: red;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            }

        .button:hover {
            background-color: #4CAF50; /* Green */
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
            <center><h3>Results</h3>
            <?php

            echo "<a href='result.php?results'>See Results</a></h2></center>";
           /* if(isset($_GET['results'])){
            $sel="select * from candidates";
            $run=mysqli_query($con,$sel);
            while($row=mysqli_fetch_array($run)){
            //$u_id=$row['user_id'];
            $a_votes=$row['a'];
            $b_votes=$row['b'];
            $c_votes=$row['c'];

           }

            $count_all=$a_votes+$b_votes+$c_votes;

            $per_a=round($a_votes*100/$count_all)."%";
            $per_b=round($b_votes*100/$count_all)."%";
            $per_c=round($c_votes*100/$count_all)."%";

            echo "
                <div align='center'>
                <h2 align='left'>Results So Far</h2>
                <p align='center' style='color:white;background:black;width:600px;padding:20px'>A: $a_votes Votes ($per_a)</p>
                <p align='center' style='color:white;background:black;width:600px;padding:20px'>B: $b_votes Votes ($per_b)</p>
                <p align='center' style='color:white;background:black;width:600px;padding:20px'>C: $c_votes Votes ($per_c)</p>
                </div>
            ";

        }*/

        if(isset($_GET['results'])){
            /* $sel="select * from candidates";
             $run=mysqli_query($con,$sel);
            while($row=mysqli_fetch_array($run)){
             //$u_id=$row['user_id'];
             $a_votes=$row['a'];
             $b_votes=$row['b'];
             $c_votes=$row['c'];
             */
             $a=0;
             $b=0;
             $c=0;
             $slct_vt="select * from candidates";
             $run_vt=mysqli_query($con,$slct_vt);
     
             while($row4=mysqli_fetch_array($run_vt)){
             $a_votes=$row4['a']; 
 
             $b_votes=$row4['b'];
             
             $c_votes=$row4['c'];
            
             if($a_votes==1){
                $a++;
             }
             if($b_votes==1){
                 $b++;
             }
             if($c_votes==1){
                $c++;
             }
             }    
             $count_all=$a+$b+$c;
         
 
             $per_a=round($a*100/$count_all)."%";
             $per_b=round($b*100/$count_all)."%";
             $per_c=round($c*100/$count_all)."%";
 
             echo "
                 <div align='center'>
                 <h2>Results So Far</h2>
                 <p style='color:white;background:black;width:400px;padding:10px;margin-left:250px'>A: $a Votes ($per_a)</p>
                 <p style='color:white;background:black;width:400px;padding:10px;margin-left:250px'>B: $b Votes ($per_b)</p>
                 <p style='color:white;background:black;width:400px;padding:10px;margin-left:250px'>C: $c Votes ($per_c)</p>
                 </div>
             ";
 
         }

    ?>  

            </div>
        </div>

    </bdoy>
</html>

<?php } ?>
