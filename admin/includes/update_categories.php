          <form action="" method="post">
          <div class="form-group">
          <label for="cat-titile">EDIT </label> 
          
          <?php
              
          if(isset($_GET['edit'])){
              
          $cat_id =  $_GET['edit'];

          $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
          $select_categories_id = mysqli_query($connection,$query);

          while($row = mysqli_fetch_assoc($select_categories_id)){
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
 
          ?>
            
            
          <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
            
          <?php }} ?>

    
            
             
            <?php 
              
            // THIS IS THE UPDATING QUERY  FOR CATEGORIES 
              
            if(isset($_POST['update_category'])){
            $the_cat_title = $_POST['cat_title'];

            $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
            $delete_query = mysqli_query($connection,$query);
              
              }
            ?>
       
          
          
          
          <input type="text" class="form-control" name="cat_title">
          </div>

          <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_category" value= "Edit Category">
          </div>  


         
         </form>