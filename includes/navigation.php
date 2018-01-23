



<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    
  <a class="navbar-brand" href="./index.php">{CODING SAIYAN} CMS FRONT </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
     
       
                 
          
           
          
       
       <li class="nav-item">
        <a class="nav-link" href="http://localhost/CMS_BLOG/admin/">Admin Access</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
        
      </li>    
     <!--PLACING SOME PHP SESSION CODE TO VERIFY THE USER SO WE CAN EDIT HIM -->
       
    <?php 

    if(isset($_SESSION['user_role'])) {
    
        if(isset($_GET['p_id'])) {
            
          $the_post_id = $_GET['p_id'];
        
        echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
        
        }
    
    
    
    }
    
    ?>
   
 
    
    </ul>
  </div>  
</nav>
    