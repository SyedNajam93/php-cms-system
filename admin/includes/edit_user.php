<!--WE WOULD BE PLACING THE PHP CODE FOR  EDITING USER PAGE HERE------------------------------------------->
<?php 
if(isset($_GET['edit_user'])){
    
$the_user_id = $_GET['edit_user'];   

$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
$select_users_query = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_users_query)){

$user_id = $row['user_id'];
$username = $row['username'];
$user_password = $row['user_password'];
$user_firstname = $row['user_firstname'];
$user_lastname =$row['user_lastname'];
$user_email =$row['user_email'];
$user_image =$row['user_image'];
$user_role =$row['user_role'];
}
}
?>
<!----------------------------------------------THE CODE ENDS HERE --------------------------------------->

<!--THIS IS THE FORM WITH PHP CODE CODE IN IT -->
<?php
if (isset($_POST['edit_user'])){

$user_id = $_POST['user_id'];
$user_firstname = $_POST['user_firstname']; // --> It's not $POST but $_POST
$user_lastname = $_POST['user_lastname'];
$user_role = $_POST['user_role'];

/*$post_image = $_FILES['image']['name'];
$post_image_temp = $_FILES['image']['tmp_name'];*/

/*$post_date = date('d-m-y');*/

$username = $_POST['username'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

/*move_uploaded_file($post_image_temp, "../images/$post_image");*/
// PLACIN THE CODE FOR UPDATIG THE USER PROFILE 

$query = "UPDATE users SET ";
$query .="user_firstname  = '{$user_firstname}', ";
$query .="user_lastname = '{$user_lastname}', ";
$query .="user_role   =  '{$user_role}', ";
$query .="username = '{$username}', ";
$query .="user_email = '{$user_email}', ";
$query .="user_password   = '{$user_password}' ";
$query .= "WHERE user_id = {$the_user_id} ";


$edit_user_query = mysqli_query($connection,$query);

confirmQuery($edit_user_query); 
    
    
    

}
?>

<!--THIS IS THE FORM WHERE WE WILL BE PLACING THE PHP CODE FOR DYNAMIC USER ROLES AND DISPLAYING INFO-->
<form action="" method="post" enctype="multipart/form-data" style="color:yellow">

<div class="form-group">
<label for="author">User Id</label>   
<input type="text" class="form-control" value="<?php echo $user_id?>" name="user_id" style="color:blue">   
</div> 


<div class="form-group">
<label for="author">First Name</label>   
<input type="text" class="form-control"  value="<?php echo $user_firstname?>" name="user_firstname">   
</div> 


<div class="form-group">
<label for="post_status">Last Name</label>   
<input type="text" class="form-control" value="<?php echo $user_lastname?>" name="user_lastname">   
</div> 
<!--PLACING DYNAMIC PHP CODE FOR USER ROLES ------------------------------------------------------------->


<div class="form-group">
 <select name="user_role" id="">
<option value="subscriber"><? php echo $user_role; ?></option> 

<?php 
if($user_role == 'admin'){
echo "<option value='subscriber'>Subscriber</option> ";}

     
else { 
echo    "<option value='admin'>Admin</option>";
}     

     
?>
 </select>   
</div>
    

<!--<div class="form-group">
<label for="post_image">post image</label>
<input type="file" name="image">
</div>-->

<div class="form-group">
<label for="post_tags">User Name</label>   
<input type="text" class="form-control" value="<?php echo $username?>" name="username">   
</div> 

<div class="form-group">
<label for="post_content">User Email</label>   
<input type="email" class="form-control" value="<?php echo $user_email?>" name="user_email">   

</div> 

<div class="form-group">
<label for="post_content">User Password</label>   
<input type="password" class="form-control"  value="<?php echo $user_password?>" name="user_password">   

</div> 


<div class="form-group">
<input type="submit" class="btn btn-primary" name="edit_user" value="Add User">
</div>

</form> 


