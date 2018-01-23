
<?php include "includes/admin_header.php";?>


<!--Navigation--->
<?php include "includes/admin_navigation.php";?>


<div id="page-wrapper">           

<?php if($connection)  echo "we are connected ";  ?>





<div class="row">


<div class="col-lg-12">
<h1>Admin Dasboard <small></small></h1>
<div class="alert alert-dismissable alert-warning">
<button data-dismiss="alert" class="close" type="button">&times;</button>
Welcome to the admin dashboard! Feel free to review all pages and modify the layout to your needs. 


</div>
</div>
</div>

<!-------WRITTING THE SWITCH STATEMENR FOR THE POST-----------------------------------------------------------------------------------------> 
<?php // including all posts or not
if(isset($_GET['source'])) {
$source = $_GET['source'];
} else {
$source = "";
}
switch($source) {
case 'add_post':
include "includes/add_post.php";
break;
case 'edit_post':
include "includes/edit_post.php";
break;
default:
include "includes/view_all_comments.php";
break;
}












?>

</div>
<?php  include "includes/admin_footer.php"; ?>   