<?php  include "db.php";?>
<!--WE WILL PLACING THE SESSION CODE HERE -->
<?php session_start();?>
<?php

if(isset($_POST['login'])){
    
 $username = $_POST['username'];    
 $password = $_POST['password'];

    
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);

$query = "SELECT * FROM users WHERE username = '{$username}' ";
$select_user_query = mysqli_query($connection,$query);
if(!$select_user_query){

die("QUERY FAILED" . mysqli_error($connection));
}

while($row = mysqli_fetch_array($select_user_query)){

 $db_id = $row['user_id'];
 $db_username = $row['username'];   
 $db_user_password = $row['user_password'];   
 $db_user_firstname = $row['user_firstname'];   
 $db_user_lastname = $row['user_lastname'];   
 $db_user_role = $row['user_role'];   

}
    
//OVER HERE WE ARE JUST CRYPTING THE PASSWORD USING THE CRYPT FUNCTION
$password = crypt($password, $db_user_password);    
    
    
//WE WILL BE WRITING A IF STATEMENT 
if($username  !== $db_username  && $password !== $db_user_password){
 header("location: ../index.php");   
}

else if($username  == $db_username  && $password == $db_user_password ){
//PLACING THE PHP SESSION CODE FROM RIGHT TO LEFT
$_SESSION ['username'] = $db_username;
$_SESSION ['firstname'] = $db_user_firstname;
$_SESSION ['lastname'] = $db_user_lastname;
$_SESSION ['user_role'] = $db_user_role;
header("location: ../admin");
    
    
}
// IF ANYTHING ELSE HAPPENS BESIDES THE ABOVE TWO STATMENTS THEN TAKE THE USER BACK TO INDEX
else {
    header("location: ../index.php");}

}
?>