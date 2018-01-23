<!--THIS IS THE PHP CODE FOR PULLING ALL THE DATE FOR THE POST FROM HE DATEBASE-->


<?php
/*This p_id is known as post id from the database*/ 
if(isset($_GET['p_id'])){

$the_post_id = $_GET['p_id']   ;
}


$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_posts_by_id = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts_by_id)){

$post_id =           $row['post_id'];
$post_author =       $row['post_author'];
$post_title=         $row['post_title'];
$post_category_id=   $row ['post_category_id'];
$post_status =       $row ['post_status'];
$post_image =        $row ['post_image'];
$post_content =      $row ['post_content'];
$post_tags =         $row ['post_tags'];
$post_date =         $row ['post_date'];
$post_comment_count =$row['post_comment_count']; 
}

//NOW WE HAVE TO CREATE A IFSET FUNCTION TO DETECT THE VALUE FROM THE HTML FORM BELOW---------------------
 
if(isset($_POST['update_post'])){

$post_author         =  ($_POST['post_author']);
$post_title          =  ($_POST['post_title']);
$post_category_id    =  ($_POST['post_category']);
$post_status         =  ($_POST['post_status']);
//$post_image          =  ($_FILES['image']['name']);
//$post_image_temp     =  ($_FILES['image']['tmp_name']);
$post_content        =  ($_POST['post_content']);
$post_tags           =  ($_POST['post_tags']);



//move_uploaded_file($post_image_temp, "../images/$post_image");
// THIS IS THE US IMPLEMENTING AN UPDATE QUERY TO THE HTML FORM  AND JOINING EACH 1 OF THEM   
//  THIS IS US FXING THE IMAGE PROBLEM USIG THE IFSET FUNCTION

if(empty($post_image)){

$query = "SELECT * FORM posts WHERE post_id = $the_post_id ";
$select_image = mysqli_query($connection,$query);    
  
while($row = mysqli_fetch_array($select_image)){
    
    $post_image = $row['post_image'];
}    
} 
    
 //  IMAGE FIXING ENDS HERE -------------------------------------------------------- 
    
  
$query = "UPDATE posts SET ";
$query .="post_author = '{$post_author}', ";    
$query .="post_title  = '{$post_title}', ";
$query .="post_category_id = '{$post_category_id}', ";
$query .="post_date   =  now(), ";
$query .="post_status = '{$post_status}', ";
$query .="post_tags   = '{$post_tags}', ";
$query .="post_content= '{$post_content}', ";
$query .="post_image  = '{$post_image}' ";
$query .= "WHERE post_id = {$the_post_id} ";

$update_post = mysqli_query($connection,$query);

confirmQuery($update_post);
     echo "<p class=''>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";


}

?>

<!--POST CODE FROM THE DATEBASE ENDS HERE------------------- ----------------- -->  



<!--IN THIS FORM WE WILL BE DISPLAYING THE INFORMATION THAT WE HAVE TO EDIT FROM THE POST THAT WE HAVE CREATED -->

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">POST TITLE</label>   
<input  value="<?php echo $post_title?>" type="text" class="form-control" name="post_title">   
</div> 



<!--PUTING DYNAMIC CATEGORY DATA FROM THE DATABASE FOR THE CATEGORIES AND DISPLAYING IT IN HTML-->
<div class="form-group">
<select name="" id="">

<?php

$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection,$query);       

confirmQuery($select_categories);

while($row = mysqli_fetch_assoc( $select_categories)) {

$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];


echo "<option value='$cat_id'>{$cat_title}</option>";

}    
?>

</select>
</div>

<!--CATEGORIES DATA ENDS HERE -->






<!--THIS IS THE HTML FORM THAT WE USE TO OUTPUT THE DATA FROM INTEGRATING THE PHP CODE CMG FROM DATABASE-->  
<div class="form-group">
<label for="post_author">Post Author</label>
<input value="<?php echo $post_author;?>"  type="text" class="form-control" name="post_author">
</div>



<div class="form-group">

<select name="post_status" id="">
<option value=""><?php echo $post_status;?></option>    
<!--NOW WE NEED TO CREATE A CONDITION-->
<?php 
if($post_status == 'published'){
echo "<option value='draft'>Draft</option>";   
}
else {
echo "<option value='published'>Publish</option>";   }    
    
?>    
</select></div>




<div class="form-group">
<label for="post_category">Post Category</label>
<input value="<?php echo $post_category_id;?>"  type="text" class="form-control" name="post_category">
</div>


<div class="form-group">
<label for="post_tags">Post Tags</label>
<input value="<?php echo $post_tags;?>"  type="text" class="form-control" name="post_tags">
</div>


<div class="form-group">

<img width="100" src="../images/<?php echo $post_image;?>" alt="">
<input  type="file" name="post_image">
</div>


<div class="form-group">
<label for="post_content">Post Content</label>
<textarea  class="form-control "name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>


</textarea>
</div>



<div class="form-group">
<input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
</div>


</form>

