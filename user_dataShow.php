<!DOCTYPE html>
<?php
$con=mysqli_connect("localhost","root","","voting_system") or die("Connection was not created");
$v=$_SESSION['email'];
?>
<html>
<body>
<table width="70px" heigth="200px" bgcolor="orange" border="2">
    <tr>
        <th>S.N</th> 
        <th>Name</th>    
        <th>Email</th>
        <th>Password</th> 
      
        
    </tr>
   <?php
        $select="select * from users where email='$v'";
        $run_select=mysqli_query($con,$select);

        $row=mysqli_fetch_array($run_select);
            $id=$row['id'];
            $name=$row['name'];
            $email=$row['email'];
            $pass=$row['pass'];
           

    ?>
    <tr align="center">
        <td><?php echo $id;?></td> 
        <td><?php echo $name;?></td>   
        <td><?php echo $email;?></td> 
        <td><?php echo $pass;?>
    </tr>

</table>

</body>
</html>