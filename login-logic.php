<?php 
require_once('include/function.php');
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if(login_user($email,$password)) {
    alert('success','Account Logged in sucessfully.');
    header('Location: account-orders.php');
}else{
    alert('danger','You Entered wrong username or password.');
    header('Location: login.php');
    
}
?>