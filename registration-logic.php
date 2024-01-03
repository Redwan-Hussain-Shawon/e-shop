<?php 
require_once('include/function.php');
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $password_1 = trim($_POST['password_1']);
  $phone_number = trim($_POST['phone_number']);
  $phone_number = trim($_POST['phone_number']);
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);
  $sql = "SELECT * FROM users WHERE email = '{$email}'";
   $result = $conn->query($sql);
   if($result->num_rows > 0){
    alert('danger','User with same email already exist');
    header('Location: login.php');
    die();
   }

   if($password != $password_1){
    alert('danger','Password did not Match. ');
    header('Location: login.php');
    die();
}
$password =  password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users(
    first_name,
    last_name,
    phone_number,
    password,
    email,
    user_type
) VALUES(
    '{$first_name}',
    '{$last_name}',
    '{$phone_number}',
    '{$password}',
    '{$email}',
    'customer'
)";
if($conn->query($sql)){
    login_user($email,$password);
    alert('success','Account Created sucessfully.');
    header('Location: account-orders.php');
}else{
    alert('danger','Failed to create account.');
    header('Location: login.php');
}

?>