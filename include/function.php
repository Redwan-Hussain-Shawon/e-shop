<?php
include "connection/connection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
define("BASE_URL", 'http://localhost/e-shop');
function url($path = '/')
{
    return BASE_URL . $path;
}
function is_logged_in()
{
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}
function logout()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    alert('success', 'Logged out successfully.');
    header('Location:login.php');
    die();
}
function protected_area()
{
    if (!isset($_SESSION['user'])) {
        alert('warning', 'Unauthorized access, Login before you proceed');
        header('Location:login.php');
        die();
    }
}

function alert($type, $message)
{
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['message'] = $message;
}
function text_input($data)
{
    $input = $data['input'];
    $attributes = (isset($data['attributes']) ? $data['attributes'] : "");
    $value = '';
    $error_text = '';
    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form']['value'])) {
            if (isset($_SESSION['form']['value'][$input])) {
                $value = $_SESSION['form']['value'][$input];
            }
        }
    }
    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form']['error'])) {
            if (isset($_SESSION['form']['error'][$input])) {
                $error = $_SESSION['form']['error'][$input];
                $error_text = '<div class="form-text text-danger">' . $error . '</div>';
            }
        }
    }

    $value = (isset($data['value']) ? $data['value'] : $value);
    $placeholder = (isset($data['plac']) ? $data['plac'] : $data['label']);

    return '<label class="form-label" for="' . $input . '">' . $data['label'] . '</label>
        <input class="form-control" type="text" value="' . $value . '" name="' . $input . '" id="' . $input . '" placeholder="' . $placeholder . '" ' . $attributes . '>' . $error_text;
}
function selectData($table, $condition = null)
{
    $sql = "SELECT * FROM $table";
    if ($condition != null) {
        $sql = "SELECT * FROM $table WHERE $condition";
    }
    global $conn;
    $res = $conn->query($sql);
    $row = [];
    if ($res->num_rows > 0) {
        while ($rows = $res->fetch_assoc()) {
            $row[] = $rows;
        }
        return $row;
    } else{
        return false;
    }
}

function insertData($table,$data)
{
    global $conn;
    $keys = implode(',', array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $sql = "INSERT INTO $table($keys) VALUES($values)";
    $result = $conn->query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}


function upload_images($files)
{
    ini_set('memory_limit', '512M');
    if ($files == null || empty($files)) {
        return false;
    }
    $uploaded_images = [];
    foreach ($files as $file) {
        if (
            isset($file['name']) &&
            isset($file['type']) &&
            isset($file['tmp_name']) &&
            isset($file['error']) &&
            isset($file['size'])
        ) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $file_name = time() . '-' . rand() . '.' . $ext;
            $destination = 'uploads/' . $file_name;
            $result = move_uploaded_file($file['tmp_name'], $destination);
            if (!$result) {
                die('Faield');
                continue;
            }
            $uploaded_images[] = ['src' => $destination]; 
        }
    }
    return $uploaded_images;
}


function login_user($email, $password)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE email='{$email}'";
    $result = $conn->query($sql);
    if ($result->num_rows < 1) {
        return false;
    }

    $row = $result->fetch_assoc();
    if (!password_verify($password, $row["password"])) {
        return false;
    }
    $_SESSION['user'] = $row;
    return true;
}
