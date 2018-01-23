<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <!-- Navigation -->
    
<?php  include "includes/navigation.php"; ?>

<!--WE WILL BE CHECKING THE  REGISTRATION FORM THROUGH OUR PHP IF ISSET FUNCTION-->  
      
<?php

if(isset($_POST['register'])){
 // CREATING THE VARIABLES TO STORE THE INFO COMING FROM THE FORM    
$username =   $_POST['username'];
$email    =   $_POST['email'];
$password =   $_POST['password'];
//ADING A VALIDATING CODE FOR THR FORM    
    
if(!empty($username) && !empty($email) && !empty($password) ){
// ADING SECURITY TO THE REGISRATION FORM 

//WE ARE CLEANING UP THE USERAME WHEN INFO IS ENTERED FROM THE FORM AND TAING OUT UNNSESSARY CHARATER AND NUMBERS    
$username = mysqli_real_escape_string($connection,$username);
$email = mysqli_real_escape_string($connection,$email);
$password = mysqli_real_escape_string($connection,$password);    
//GO PHPMYADMIN AND IN THE sandSalt  put default value to $2y$10$iusesomecrazystring
//BZC WE NEED TO CRYPT IT , NOW ADD QUERY  
//WE ARE MAKING A CONNECTION HERE     
$query = "SELECT randSalt FROM users";   
$select_randsalt_query = mysqli_query($connection, $query);
if(!$select_randsalt_query){
die("QUERY FAILED". mysqli_error($connection));   
}

    
$row = mysqli_fetch_array($select_randsalt_query);
$salt = $row['randSalt'];    
$password = crypt($password, $salt);    
    
    
    
//WE ARE INSERTING THE VALUES FROM THE REG FORM TO THE DTABASE    
$query = "INSERT INTO users (username,user_email,user_password,user_role)";    
$query .= "VALUES ('{$username}','{$email}','{$password}', 'subscriber' )";   
$register_user_query = mysqli_query($connection, $query);    
    
  
$message = "Your registration has been submitted  ";
    
}

else{
    
$message = "Fields can not be empty ";
   
}
//main else statemen
} else{
//craeting the undefined vari    
$message = "";    
}
?>
  
  

  
  
  
  
  <!-- Page Content -->
   
   
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       
                        <h6 class="text-center"><?php echo $message?></h6>            
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username"

                            autocomplete="on"

                            value="">

                            <p></p>

                       
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="" >

                             <p></p>
              
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">

                            <p></p>


                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>




<?php  include "includes/footer.php"; ?>