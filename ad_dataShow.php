<!DOCTYPE html>
<?php
$con=mysqli_connect("localhost","root","","voting_system") or die("Connection was not created");
$v=$_SESSION['admin_email'];
?>
<html>
<body>
<table width="70px" heigth="200px" bgcolor="orange" border="2">
    <tr>
        <th>S.N</th> 
        <th>Name</th> 
        <th>Image</th>   
        <th>Email</th>
        <th>Password</th> 
        <th>Phone</th> 
        <th>Gender</th>    
        <th>Birthday</th>
        <th>Country</th> 
        <th>Address</th> 
        <th>Last Updated</th>
        
    </tr>
   <?php
        $select="select * from admin where admin_email='$v'";
        $run_select=mysqli_query($con,$select);

        $row=mysqli_fetch_array($run_select);
            $admin_id=$row['admin_id'];
            $admin_name=$row['admin_name'];
            $imag=$row['imag'];
            $admin_email=$row['admin_email'];
            $admin_pass=$row['admin_pass'];
            $phone=$row['phone'];
            $gender=$row['gender'];
            $b_day=$row['b_day'];
            $country=$row['country'];
            $addr=$row['addr'];
            $update_date=$row['update_date'];


    ?>
    <tr align="center">
        <td><?php echo $admin_id;?></td> 
        <td><?php echo $admin_name;?></td>
        <td>
       <?php echo '<img src="upld/'.$imag.'" height="100" width="100"  />';?>

        </td>    
        <td><?php echo $admin_email;?></td> 
        <td><?php echo $admin_pass;?>
        <td><?php echo $phone;?></td> 
        <td><?php echo $gender;?></td>
        <td><?php echo $b_day;?></td> 
        <td><?php echo $country;?></td>    
        <td><?php echo $addr;?></td> 
        <td><?php echo $update_date;?></td> 
    
    </tr>

</table>

</body>
</html>