<?php
require_once '../DB/connect.php';
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['rdoGen']) && isset($_POST['chkHob']) && isset($_POST['password'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['rdoGen'];
    $hobbies = $_POST['chkHob'];
    $password = $_POST['password'];
    $output = 'nothing';
    $sql = "INSERT INTO `user_info`(`u_fname`, `u_lname`, `u_email`, `u_gender`, `u_hobbies`, `u_password`) VALUES ('$fname', '$lname', '$email', '$gender', '$hobbies', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $output = "success";
    } else {
        // $output = "Registration Failed";
        $output = mysqli_error($conn);
    }
    echo $output;
}
?>