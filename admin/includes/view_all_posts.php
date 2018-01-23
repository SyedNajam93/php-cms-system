<!--PLACING THE PHP CODE FOR LOOPING AROUND THE CHECKBOXES and cathcing the value-->
<?php 
if(isset($_POST['checkBoxArray'])){
    
foreach($_POST['checkBoxArray'] as $postValueId){
            
 $bulk_options = $_POST['bulk_options'];

//NOW WE WILL BE CREATING THE SWITCH STATMENT FOR THE REST OF THE BULK OPTIONS

    switch($bulk_options){
        
case 'published':        
//WE R CREATINF THE UPDATE QUERY FOR THE CHECK BOXES 
$query = "UPDATE posts SET post_status = '{$bulk_options}' 
WHERE post_id= {$postValueId} ";
//SENDING THE QUERY CONNECTION
$update_to_published_status = mysqli_query($connection,$query);
//PLACIN THE CONFIRM QUERY
confirmQuery($update_to_published_status);        
break;        



case 'draft':        
//WE R CREATING THE UPDATE QUERY FOR THE CHECK BOXES 
$query = "UPDATE posts SET post_status = '{$bulk_options}' 
WHERE post_id= {$postValueId} ";
//SENDING THE QUERY CONNECTION
$update_to_draft_status = mysqli_query($connection,$query);
//PLACIN THE CONFIRM QUERY
confirmQuery($update_to_draft_status);        
break;       

case 'delete':        
//WE R CREATING THE UPDATE QUERY FOR THE CHECK BOXES 
$query = "DELETE FROM posts WHERE post_id= {$postValueId} ";
//SENDING THE QUERY CONNECTION
$update_to_delete_status = mysqli_query($connection,$query);
//PLACIN THE CONFIRM QUERY
confirmQuery($update_to_delete_status);        
break;  


}
}
}
?>


<form action="" method="POST">

<table class="table table-bordered table-hover">
<!--ADDING THE BULK OPTIONS HERE FOR THE RADIO BOX -->

<div id="bulkOptionContainer" class="col-xs-4">
<select class="form-control" name="bulk_options" id="">
    
<option value="">Select Options</option>
<option value="published">Publish</option>
<option value="draft">Draft</option>
<option value="delete">Delete</option>
</select>
</div>
<!--CODE ENDS HERE-->

<div class="col-xs-4">
<input type="submit" name='submit' class="btn btn-success"  value="Apply"  >    
<a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>   
</div>




<thead>
<tr>
<th><input id="selectAllBoxes" type="checkbox"></th>
<th>Id</th>
<th>Author</th>
<th>Title</th>
<th>Status</th>
<th>Image</th>
<th>Tags</th>
<th>Comments</th>
<th>Comment Count</th>

<th>Date</th>
<th>View Post</th>
<th>Edit</th>
<th>Delete</th>
<th>Views</th>
</tr>
</thead>

<tbody>
  
<!--PLCING THE PH CODE HERE TO RETRIEVE ALL DATA FROM DATABASE-->
 <?php
            
$query = "SELECT * FROM posts";
$select_posts = mysqli_query($connection,$query);


while($row = mysqli_fetch_assoc($select_posts)){

$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title= $row['post_title'];
$post_status = $row ['post_status'];
$post_image = $row ['post_image'];
$post_category_id= $row ['post_category_id'];
$post_tags = $row ['post_tags'];
$post_content = $row ['post_content'];
 $post_date = $row ['post_date'];
$post_comment_count = $row['post_comment_count'];  
//WE WILL CALLING OUT THE ROWS HERE TO KEEP ON REPRODUCING 1 BY 1

/*placing the check box code here*/    
echo "<tr>";
?>   
<td><input id='checkBoxes' type='checkbox' name='checkBoxArray[]' 
value='<?php echo $post_id; ?>'></td>

<?php

echo "<td>$post_id</td>";
echo "<td>$post_author</td>";
echo "<td>$post_title</td>";
echo "<td>$post_status</td>";
echo "<td><img width='100' src ='../images/$post_image' alt='image'></td>";
echo "<td>$post_tags</td>";   
echo "<td>$post_content</td>";
echo "<td>$post_comment_count</td>";

echo "<td>$post_date</td>";
echo "<td><a href='../post.php?p_id={$post_id}' >View Post</a></td>"; 
echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}' >EDIT</a></td>"; 
echo "<td><a href='posts.php?delete={$post_id}' >DELETE</a></td>";
echo "<td>$post_comment_count</td>";
    
echo  "</tr>";


}
?> 
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
</tbody>
</table>
</form>
<!-- POST DATA CMG FROM DATABASE   PLACED INSIDE A LOOP ENDS HERE    -->

<!--THIS IS THE CODE FOR DELETING THE POST FROM THE DATABASE-->


<?PHP
if(isset($_GET['delete'])){

$the_post_id = $_GET['delete'];

$query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
$delete_query = mysqli_query($connection, $query); 
}
?>
<!--CODE ENDS HERE--------------------------------------------->











