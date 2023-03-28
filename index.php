<?php
include 'includes/header.php';
$sql = "SELECT * FROM `user_info` WHERE `u_email` = '" . $_SESSION['email'] . "'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$uname = $data['u_fname'] . ' ' . $data['u_lname'];
?>
<div class="container mt-5">
    <h1 class="pb-3 border-bottom">WelCome, <?php echo $uname; ?> </h1>
    <div class="col-md-12 d-flex justify-content-center">
        <div class="row shadow col-md-6 rounded p-3 mt-3">
            <h2 class="text-success">Your Details</h2>
            <hr>
            <div class="row mb-3">
                <div class="col">
                    <h5>First Name : <b><?php echo $data['u_fname']; ?></b></h3>
                </div>
                <div class="col">
                    <h5>Last Name : <b><?php echo $data['u_lname']; ?></b></h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <h5>Email Address : <b><?php echo $data['u_email']; ?></b></h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <h5>Gender : <b><?php echo $data['u_gender']; ?></b></h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <h5>Hobbies : <b><?php echo $data['u_hobbies']; ?></b></h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <a href="editInfo.php" class="btn btn-primary">Edit Info</a>
                </div>
                <div class="col">
                    <a href="changePassword.php" class="btn btn-success">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>