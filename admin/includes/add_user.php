
<?php
if (isset($_POST['create_user'])){

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

$query = "INSERT INTO users(user_id, user_firstname, user_lastname, user_role, username, user_email, user_password) ";

$query .= " VALUES({$user_id},'{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}', '{$user_password}') ";

$create_user_query = mysqli_query($connection, $query);

confirmQuery($create_user_query);


}
?>




<form action="" method="post" enctype="multipart/form-data" style="color:yellow">

<div class="form-group">
<label for="author">User id</label>   
<input style="color:blue" type="text" class="form-control" name="user_id">   
</div> 



<div class="form-group">
<label for="author">Firstname</label>   
<input style="color:blue" type="text" class="form-control" name="user_firstname">   
</div> 


<div class="form-group">
<label for="post_status">Lastname</label>   
<input style="color:blue" type="text" class="form-control" name="user_lastname">   
</div> 

<div class="form-group">
 <select name="user_role" id="">
<option value="subcriber">Select Options</option> 
<option value="admin">Admin</option>
<option value="subcriber">Subcriber</option> 
 </select>   
</div>
    





<!--<div class="form-group">
<label for="post_image">post image</label>
<input type="file" name="image">
</div>-->

<div class="form-group">
<label for="post_tags">Username</label>   
<input style="color:blue" type="text" class="form-control" name="username">   
</div> 

<div class="form-group">
<label for="post_content">User Email</label>   
<input style="color:blue" type="email" class="form-control" name="user_email">   

</div> 

<div class="form-group">
<label for="post_content">User Password</label>   
<input style="color:blue" type="password" class="form-control" name="user_password">   

</div> 


<div class="form-group">
<input type="submit" class="btn btn-primary" name="create_user" value="Add User">
</div>

</form> 































