
<!--THIS IS THE SINGLE POST PAGE THAT WE HAVE TO CREATE ALONG WITH THE COMMENTS SYSTEM -->

<?php  include "includes/header.php"; ?>
<?php include "includes/db.php";?>     

<!-- Navigation -->
<?php include "includes/navigation.php" ?>





<!-- Page Content -->
<div class="container">

<div class="row">

<!-- Post Content Column -->
<div class="col-lg-8">

<!--THE WHILE LOOP STARTS HERE -->
<!--WE ALSO CATCHING THE P_ID FROM THE INDEX PAGE FOR THE SINGLE POST PAGE AND ITS LINK-->

<?php
    
if(isset($_GET['p_id'])){

$the_post_id = $_GET['p_id'];
}    
   
?>


<?php            
$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_all_posts_query = mysqli_query($connection,$query);           


while ($row = mysqli_fetch_assoc($select_all_posts_query)) {

$post_title = $row['post_title'];   
$post_author = $row['post_author'];  
$post_date = $row['post_date'];   
$post_image = $row['post_image']; 
$post_content = $row['post_content'];           

?>       

<!-- Title -->
<h1 class="mt-4"><?php echo $post_title ?></h1>

<!-- Author -->
<p class="lead">
by
<a href="#"><?php echo $post_author ?></a>
</p>

<hr>

<!-- Date/Time -->
<p>Posted on <?php echo $post_date ?></p>

<hr>

<!-- Preview Image -->
<img class="img-fluid rounded" src="images/<?php echo $post_image; ?>" alt="">

<hr>

<!-- Post Content -->
<p class="lead"><?php echo $post_content ?></p>

<?php } ?>            
<!--THE WHILE LOOP ENDS HEERE-->
<!-------------------------------------------------------------------------------------------------------->
<!--PHP CODE FOR THE SUBMIT FORM STARTS HERE -->
<!--WE WILL BE PLACING THE PHP AND JAVASCRIPT TO CHECK IF THE COMMENT FORM IS NOT EMPTY-->
<?php

if(isset($_POST['create_comment'])){
 //GET THE POST ID  FROM THE URL
$the_post_id = $_GET['p_id'];   
    
$comment_author = $_POST['comment_author'];    
$comment_email = $_POST['comment_email']; 
$comment_content = $_POST['comment_content']; 

    
//PLACING ANOTHER IF STATEMENT AND THE PLACE EMPTY CODE TO WETHER THE FIELDS ARE EMPY OR NOT     
if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
    
$query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";    

$query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";   
// WRITING THE PHP CODE FOR THE CONNECTION TO SEE IF THE QUERY FAILS OR NOT
$create_comment_query = mysqli_query($connection,$query);
if(!$create_comment_query){
die ('QUERY FAILED'. mysqli_error($connection));    
}    

// NOW WE WILL BE WRITING THE PHP CODE FOR COMMENT COUNTS THAT INREASES AUTO-MATICALLY  
$query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
$query .= "WHERE post_id = $the_post_id";
$update_comment_count = mysqli_query($connection,$query);



} else {echo "<script>alert('Field cannot be empty')</script>";}
    }
  
    
?>
<!-------------------------------------------------------------------------------------------------------->
<!--THIS WHERE THE COMMENTING FORM STARTS -->
<!-- Comments Form -->
<div class="card my-4">
<h5 class="card-header" style="color:red;">Leave a Comment:</h5>
<div class="card-body">

<form action="" method="post" >

<div class="form-group">
    <label for="author">Author</label>   
    <input type="text" class="form-control" name="comment_author">   
   </div> 
   
   <div class="form-group">
    <label for="author">Email</label>   
    <input type="email" class="form-control" name="comment_email">   
   </div> 

<div class="form-group">
<label for="content">Content</label>
<textarea class="form-control" rows="3" name="comment_content"></textarea>
</div>


<button type="submit"  name="create_comment" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

<!--THIS WHERE THE COMMENTING FORM ENDS -->
<!--THIS IS THE PHP CODE FOR SHOWING COMMENTS MADE BY PEOPLE UNDER THE POST-->
<?php 
    
$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
$query .= "AND comment_status = 'approved' ";
$query .= "ORDER BY comment_id DESC ";
$select_comment_query = mysqli_query($connection,$query);
if(!$select_comment_query){
die ('query failed' . mysqli_error($connection));
}

while($row = mysqli_fetch_array($select_comment_query)){
$comment_date = $row['comment_date'];
$comment_content = $row['comment_content'];
$comment_author = $row['comment_author'];
 
?>    
<div class="media mb-4">

<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
<div class="media-body">
<h5 class="mt-0"><?php echo $comment_author; ?> On <?php echo $comment_date; ?></h5>
<?php echo $comment_content; ?>


</div>
</div> 
<?php } ?>  
    
<!-- COMMENTS RELATED TO THE POST PLACING THE PHP QUERY CODE HERE  -->


</div>
















<!-- Sidebar Widgets Column -->
<div class="col-md-4"><!---Plcing the php code for the search blog--->

<?php

if(isset($_POST['submit'])){

echo $search = $_POST['search'];   

}?>  




<div class="card my-4">
<h4>BLOG SEARCH </h4>
<form action="search.php" method="post">
<div class="card-body">    
<input name="search" type="text" class="form-control" placeholder="Search.....">
<span class="input-group-btn">
<button name="submit" class="btn btn-default" type="submit">submit
<span class="input-group-btn"></span>    

</button>    

</span>


</div>    

</form>

</div>              



<!-- Categories Widget -->
<div class="card my-4">
<h5 class="card-header">Blog Categories</h5>
<div class="card-body">
<div class="row">
<div class="col-lg-6">
<ul class="list-unstyled mb-0">




<!--WE PUT THE WHILE LOOP INSIDE THE INDEX PAHESO THAT E COULD GET MULTIPLE CATTEGORY DISPLAYING ON THE MAIN PAGE-->  
<?php         

$query = "SELECT * FROM categories";        
$select_all_categories_query = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_all_categories_query)){
$cat_title = $row['cat_title'];	

echo "<li><a href='#'>{$cat_title}</a> </li>";	

}



?>              


</ul>
</div>
</div>
</div>
</div>

<!-- Side Widget -->
<div class="card my-4">
<h5 class="card-header">Side Widget</h5>
<div class="card-body">
You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
</div>
</div>

</div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<?php  include "includes/footer.php"; ?>