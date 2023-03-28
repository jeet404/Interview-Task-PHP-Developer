<?php
require_once '../DB/connect.php';
if (isset($_POST['newPass'])) {
    $newPass = $_POST['newPass'];
    $sql = "UPDATE `user_info` SET `u_password` = '$newPass' WHERE `u_email` = '" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>