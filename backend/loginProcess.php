<?php
require_once '../DB/connect.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $output = 'nothing';
    $sql = "SELECT * FROM `user_info` WHERE `u_email` = '$email' AND `u_password` = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $email;
        $output = "success";
    } else {
        $output = "Login Failed";
    }
    echo $output;
}
?>