<!-- Sidebar Widgets Column -->

<div class="col-md-4">
<!---Plcing the php code for the search blog--->

<?php

if(isset($_POST['login'])){

echo $search = $_POST['search'];   

}         

?>  

 <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search">search</span>
                        </button>
                        </span>
                    </div>
                    </form><!--search form-->
                    <!-- /.input-group -->
                </div>    

 
 
 <!--LOGIN FORM-->
 
<div class="well">
<h4>Login</h4>    
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter Username">    
                    </div>    

                        <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter Password">    
                        <span class="input-group-btn">
                        <button class="btn btn-primary" name="login" type="submit">Submit
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
$cat_id = $row['cat_id'];	
echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a> </li>";	

}
?>              


<li>

</li>

</ul>
</div>
</div>
</div>
</div>




<!-- Side Widget -->
<div class="card my-4">
<h5 class="card-header">Side Widget</h5>
<div class="card-body">

</div>
</div>

</div>


<!-- /.row -->


<!-- /.container -->