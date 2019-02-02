<!DOCTYPE html>
<?php
$con=mysqli_connect("localhost","root","","voting_system") or die("Connection was not created");
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
        <th>Edit</th>
        <th>Delete</th>
        
    </tr>
   <?php
        $select="select * from cand_info";
        $run_select=mysqli_query($con,$select);

        while($row=mysqli_fetch_array($run_select)){
            $cand_id=$row['cand_id'];
            $cand_name=$row['cand_name'];
            $cand_image=$row['cand_image'];
            $cand_email=$row['cand_email'];
            $cand_gender=$row['cand_gender'];
            $cand_bday=$row['cand_bday'];
            $cand_country=$row['cand_country'];
            $cand_update=$row['cand_update'];

    ?>
    <tr align="center">
        <td><?php echo $user_id;?></td> 
        <td><?php echo $user_name;?></td>    
       <!-- <td><?php //echo $user_pass;?></td> -->
        <td><?php echo $user_email;?></td> 
        <td><a href="show_data.php?edit=<?php echo $user_id;?>">Edit</a></td> 
        <td><a href="show_data.php?delete=<?php echo $user_id;?>">Delete</a></td>
    </tr>
        <?php } ?>
</table>
<?php
    if(isset($_GET['edit'])){

        //include("Unused/edit1.php");
        include("edit.php");
       

    }
?>
<?php
    if(isset($_GET['delete'])){
       
        $delete_id=$_GET['delete'];
        $delete="delete from users where id='$delete_id'";

        $run_delete = mysqli_query($con,$delete);

        if($run_delete){
            echo "<script>alert('A user has been deleted')</script>";//pop-up massage in js
            echo "<script>window.open('usersInfo.php','_self')</script>";//refresh the page in js
        }
    }
?>
</body>
</html>