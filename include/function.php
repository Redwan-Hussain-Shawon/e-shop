<?php 
    include "connection/connection.php";
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    define("BASE_URL",'http://localhost/e-shop');
    function url($path='/'){
        return BASE_URL.$path;
    }
    function is_logged_in(){
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            return true;
        }else{
            return false;
        }
    }

    function alert($type, $message){
        $_SESSION['alert']['type'] = $type;
        $_SESSION['alert']['message'] = $message;
    }

    function login_user($email, $password){
        global $conn;
        $sql = "SELECT * FROM users WHERE email='{$email}'";
        $result = $conn->query($sql);
        if($result->num_rows < 1){
            return false;
    }

    $row = $result->fetch_assoc();
    if(!password_verify($password,$row["password"])){
        return false;
    }
    $_SESSION['user']= $row;
    return true;
}
    


?>