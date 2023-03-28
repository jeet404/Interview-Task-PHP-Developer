<?php
require_once '../DB/connect.php';
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['rdoGen']) && isset($_POST['chkHob'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['rdoGen'];
    $hobbies = $_POST['chkHob'];
    $output = 'nothing';
    $sql = "UPDATE `user_info` SET `u_fname`='$fname',`u_lname`='$lname',`u_gender`='$gender',`u_hobbies`='$hobbies' WHERE `u_email`='" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['email'] = $email;
        $output = "success";
    } else {
        $output = mysqli_error($conn);
    }
    echo $output;
}
?>