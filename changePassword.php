<?php
include 'includes/header.php';
$sql = "SELECT u_password FROM `user_info` WHERE `u_email` = '" . $_SESSION['email'] . "'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>
<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <form class="shadow rounded col-md-6 p-5" method="post">
            <h1 class="col-md-12 mb-5 text-center border-bottom pb-3">Edit Details</h1>
            <div class="mb-3">
                <label class="form-label">Enter Old Password</label>
                <input type="password" name="oldPass" id="oldPass" class="form-control" required />
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Enter New Password</label>
                    <input type="password" name="newPass" id="newPass" class="form-control" required />
                </div>
                <div class="col">
                    <label class="form-label">Enter Confirm Password</label>
                    <input type="password" name="cPass" id="cPass" class="form-control" required />
                </div>
            </div>
            <div class="mb-3">
                <input type="submit" name="iChange" id="iChange" value="Change" class="btn btn-success" />
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#iChange').click(function() {
            var oldPass = $('#oldPass').val();
            var newPass = $('#newPass').val();
            var cPass = $('#cPass').val();
            var uppercase = /[A-Z]/g;
            var lowercase = /[a-z]/g;
            var number = /[0-9]/g;
            if (oldPass == '<?php echo $data['u_password'] ?>' && newPass == cPass && newPass != oldPass && newPass.match(uppercase) && newPass.match(lowercase) && newPass.match(number) && newPass.length >= 8) {
                $.ajax({
                    url: 'backend/changePassword.php',
                    type: 'POST',
                    data: {
                        newPass: newPass
                    },
                    success: function(data) {
                        if (data == 'success') {
                            alert('Password Changed Successfully');
                            window.location.href = 'index.php';
                        } else {
                            alert('Something Went Wrong');
                        }
                    }
                });
            } else {
                alert('You Entered Wrong Password');
            }
        });
    });
</script>
<?php
include 'includes/footer.php';
?>