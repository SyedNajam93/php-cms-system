
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
        
<!-------------------------------------------------------------------------------------------------------->     
     
          <div class="col-xs-3">

      

          <?php insert_categories(); ?>
          
  
          <form action="" method="post">
          <div class="form-group">
          <label for="cat-titile">Add Category</label> 
          <input type="text" class="form-control" name="cat_title">
          </div>

           <div class="form-group">
           <input class="btn btn-primary" type="submit" name="submit" value= "Add Category">
           </div>  


         
           </form>
           </div>
  <!--------------------------------------ADDING EDITTING  FORM AND ITS QUERY------------------------------------------>         
 
    
            <div class="col-xs-3">
     
            <?php
            
            if(isset($_GET['edit'])){


            $cat_id = $_GET	['edit'];

            include "includes/update_categories.php";

            }  
              
            ?>       

         
         </div>
         </div>         
          
<!-------------------------------------------------------------------------------------------------------->         

          
          
          

           
           
<!----THIS IS THE TABLE FORM FOR THE  CATEGORIES---->            
    <div class="col-xs-6">
                  

            
    <table class="table">
    <thead>
    <tr>
    <th>ID</th>
    <th>CATEGORY TITLE</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    
<?php //FIND ALL CATEGORY QUERY
                
                   $query = "SELECT * FROM categories";        
                   $select_categories = mysqli_query($connection,$query);
              
        
        
                   while($row = mysqli_fetch_assoc($select_categories)){
               
                   $cat_id = $row['cat_id'];	  
                   $cat_title = $row['cat_title'];	
	
                    echo "<tr>";
                    echo "<td>{$cat_id}</td>";	
	                echo "<td>{$cat_title}</td>";	
                    echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                       
                    echo "</tr>";
}
?>
  
<?php // THIS IS THE QUERY TO DELETE  THE CATEGORIES


if(isset($_GET['delete'])){
$the_cat_id = $_GET['delete'];

$query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
$delete_query = mysqli_query($connection,$query);
header("Location:categories.php");   

}     
        
        
?> 
        
 </tr>            
    </tbody>
 
</table>        
   






















</div>
<?php  include "includes/admin_footer.php"; ?>   