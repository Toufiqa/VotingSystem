<!DOCTYPE html>
<?php
$con=mysqli_connect("localhost","root","","voting_system") or die("Connection was not created");
?>
<html>
<body>
<table width="500" bgcolor="orange" border="2">
    <tr>
        <th>S.N</th> 
        <th>Name</th>    
        <!--<th>Password</th>-->
        <th>Email</th> 
        <th>Edit</th> 
        <th>Delete</th> 
    </tr>
   <?php
        $select="select * from users";
        $run_select=mysqli_query($con,$select);

        while($row=mysqli_fetch_array($run_select)){
            $user_id=$row['id'];
            $user_name=$row['name'];
            //$user_pass=$row['pass'];
            $user_email=$row['email'];

    ?>
    <tr align="center">
        <td><?php echo $user_id;?></td> 
        <td><?php echo $user_name;?></td>    
       <!-- <td><?php //echo $user_pass;?></td> -->
        <td><?php echo $user_email;?></td> 
        <td><a href="usersInfo.php?edit=<?php echo $user_id;?>">Edit</a></td> 
        <td><a href="usersInfo.php?delete=<?php echo $user_id;?>">Delete</a></td>
    </tr>
        <?php } ?>
</table>

</body>
</html>