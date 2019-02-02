<!DOCTYPE html>
<?php
$con=mysqli_connect("localhost","root","","voting_system");
?>
<html>
<head>
    <title>Online Voting System</title>
    <style>
        
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

<?php
        $slct="select * from login order by log_id DESC";
        $run_slct=mysqli_query($con,$slct);

        $row1=mysqli_fetch_array($run_slct);
            $uemail=$row1['uemail'];
            $upass=$row1['password'];
        
        $select1="select * from users where email='$uemail' and pass='$upass'";
        $run_select1=mysqli_query($con,$select1);

        $row2=mysqli_fetch_array($run_select1);
            $uid=$row2['id'];

        /*$slct_can="select * from candidates order by 1 DESC";
        $run_slctcan=mysqli_query($con,$slct_can);
    
        $row3=mysqli_fetch_assoc($run_slctcan);
            $a_val=$row3['a']; 

            $b_val=$row3['b'];
            
            $c_val=$row3['c'];
        */
    ?>
    <div id="con">
 <h2 align="center">Give Your Vote To The Best One!</h2>
    <div id="candidates" align="center">
        <img src="vImage\aR.jpg" width="200" height="200"/>
        <img src="vImage\bR.jpg" width="200" height="200"/>
        <img src="vImage\cR.jpg" width="200" height="200"/>
    </div>

    <!--Try to avoid the use of get method where pass is involved-->
    <form action="online_voting1.php" method="post" align="center">
        <input type="submit" name="a" value="Vote to A"/>
        <input type="submit" name="b" value="Vote to B"/>
        <input type="submit" name="c" value="Vote to C"/>
    </form>

 

    <?php
        $val=1;
        $z=0;
        //$con=mysqli_connect("localhost","root","","voting_system");
        
        if(isset($_POST['a'])){

           $check_id="select * from candidates where user_id='$uid'";
           $run_id=mysqli_query($con,$check_id);

           if(mysqli_num_rows($run_id)===0){
              //$a_val++;
            $info_insert="insert into candidates (user_id,a,b,c) values ('$uid','$val','$z','$z')";
            $run_a=mysqli_query($con,$info_insert);
           /* $a="update candidates set a=a+1";
            $run_a=mysqli_query($con,$a);*/

            if($run_a){
                echo "<center><h2>Your vote has been cast!<br/>";
                echo "<a href='online_voting1.php?results'>See Results</a></h2></center>";
            }
            else{
                echo "Error in query!";
            }
         }
         else{
            echo "Sorry! You can only give vote once!";
        }
        }

        if(isset($_POST['b'])){
            /*$b="update candidates set b=b+1";
            $run_b=mysqli_query($con,$b);

            echo "<center><h2>Your vote has been cast!<br/>";
            echo "<a href='online_voting.php?results'>See Results</a></h2></center>";*/
            
           $check_id="select * from candidates where user_id='$uid'";
           $run_id=mysqli_query($con,$check_id);

           if(mysqli_num_rows($run_id)===0){
            //$b_val++;
            $info_insert1="insert into candidates (user_id,a,b,c) values ('$uid','$z','$val','$z')";
            $run_b=mysqli_query($con,$info_insert1);
        
            if($run_b){
                echo "<center><h2>Your vote has been cast!<br/>";
                echo "<a href='online_voting1.php?results'>See Results</a></h2></center>";
            }
          }
        else{
            echo "Sorry! You can only give vote once!";
        }
    }

        if(isset($_POST['c'])){
           /* $c="update candidates set c=c+1";
            $run_c=mysqli_query($con,$c);

            echo "<center><h2>Your vote has been cast!<br/>";
            echo "<a href='online_voting.php?results'>See Results</a></h2></center>";*/

            $check_id="select * from candidates where user_id='$uid'";
            $run_id=mysqli_query($con,$check_id);

            if(mysqli_num_rows($run_id)==0){
                //$c_val++;
                $info_insert2="insert into candidates (user_id,a,b,c) values ('$uid','$z','$z','$val')";
                $run_c=mysqli_query($con,$info_insert2);
        
            if($run_c){
                echo "<center><h2>Your vote has been cast!<br/>";
                echo "<a href='online_voting1.php?results'>See Results</a></h2></center>";
            }
        }
            else{
                echo "Sorry! You can only give vote once!";
            }
        }
    ?>

    <?php
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
                <p style='color:white;background:black;width:400px;padding:10px'>A: $a Votes ($per_a)</p>
                <p style='color:white;background:black;width:400px;padding:10px'>B: $b Votes ($per_b)</p>
                <p style='color:white;background:black;width:400px;padding:10px'>C: $c Votes ($per_c)</p>
                </div>
            ";

        }
    ?>

    </div>
</body>
</html>