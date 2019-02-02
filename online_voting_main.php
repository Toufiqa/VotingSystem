<!DOCTYPE html>
<html>
<head>
    <title>Online Voting System</title>
    <style>
        body{
            <background-color: blue;
            padding: 0;
            margin: 0;
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
    
    </style>
</head>
<body>
    <div id="con">
    <h2 align="center">Your vote to the best candidate of the year</h2>
    <div id="candidates" align="center">
        <img src="vImage\aR.jpg" width="200" height="200"/>
        <img src="vImage\bR.jpg" width="200" height="200"/>
        <img src="vImage\cR.jpg" width="200" height="200"/>
    </div>

    <form action="online_voting.php" method="post" align="center">
        <input type="submit" name="a" value="Vote to A"/>
        <input type="submit" name="b" value="Vote to B"/>
        <input type="submit" name="c" value="Vote to C"/>
    </form>

    <?php
        $con=mysqli_connect("localhost","root","","voting_system");
        if(isset($_POST['a'])){
            $a="update candidates set a=a+1";
            $run_a=mysqli_query($con,$a);

            echo "<center><h2>Your vote has been cast!<br/>";
            echo "<a href='online_voting.php?results'>See Results</a></h2></center>";
        }

        if(isset($_POST['b'])){
            $b="update candidates set b=b+1";
            $run_b=mysqli_query($con,$b);

            echo "<center><h2>Your vote has been cast!<br/>";
            echo "<a href='online_voting.php?results'>See Results</a></h2></center>";
        }

        if(isset($_POST['c'])){
            $c="update candidates set c=c+1";
            $run_c=mysqli_query($con,$c);

            echo "<center><h2>Your vote has been cast!<br/>";
            echo "<a href='online_voting.php?results'>See Results</a></h2></center>";
        }
    ?>

    <?php
        if(isset($_GET['results'])){
            $sel="select * from candidates";
            $run=mysqli_query($con,$sel);
            $row=mysqli_fetch_array($run);
            $a_votes=$row['a'];
            $b_votes=$row['b'];
            $c_votes=$row['c'];

            $count_all=$a_votes+$b_votes+$c_votes;

            $per_a=round($a_votes*100/$count_all)."%";
            $per_b=round($a_votes*100/$count_all)."%";
            $per_c=round($a_votes*100/$count_all)."%";

            echo "
                <div align='center'>
                <h2>Results So Far</h2>
                <p style='color:white;background:black;width:400px;padding:10px;margin-left:250px'>A: $a_votes Votes ($per_a)</p>
                <p style='color:white;background:black;width:400px;padding:10px;margin-left:250px'>B: $b_votes Votes ($per_b)</p>
                <p style='color:white;background:black;width:400px;padding:10px;margin-left:250px'>C: $c_votes Votes ($per_c)</p>
                </div>
            ";

        }
    ?>

    </div>
</body>
</html>