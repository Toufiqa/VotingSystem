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
        <th>Gender</th>    
        <th>Birthday</th>
        <th>Country</th> 
        <th>Last Updated</th>
        
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
        <td><?php echo $cand_id;?></td> 
        <td><?php echo $cand_name;?></td>
        <td>
        <?php echo '<img src="upld/'.$cand_image.'" height="100" width="100"  />';?>
        </td>    
        <td><?php echo $cand_email;?></td> 
        <td><?php echo $cand_gender;?></td>
        <td><?php echo $cand_bday;?></td> 
        <td><?php echo $cand_country;?></td>    
        <td><?php echo $cand_update;?></td> 
        <td><a href="candidatesInfo.php?edit=<?php echo $cand_id;?>">Edit</a></td> 
        <td><a href="candidatesInfo.php?delete=<?php echo $cand_id;?>">Delete</a></td>
    </tr>
        <?php } ?>
</table>
<?php
   /* if(isset($_GET['edit'])){

        //include("Unused/edit1.php");
        include("edit.php");
       

    }*/
?>
<?php
    /*if(isset($_GET['delete'])){
       
        $delete_id=$_GET['delete'];
        $delete="delete from users where id='$delete_id'";

        $run_delete = mysqli_query($con,$delete);

        if($run_delete){
            echo "<script>alert('A user has been deleted')</script>";//pop-up massage in js
            echo "<script>window.open('usersInfo.php','_self')</script>";//refresh the page in js
        }
    }*/
?>
</body>
</html>