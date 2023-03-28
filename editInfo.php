<?php
include 'includes/header.php';
$sql = "SELECT * FROM `user_info` WHERE `u_email` = '" . $_SESSION['email'] . "'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$uname = $data['u_fname'] . ' ' . $data['u_lname'];
?>
<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <form class="shadow rounded col-md-6 p-5" method="post">
            <h1 class="col-md-12 mb-5 text-center border-bottom pb-3">Edit Details</h1>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">First Name</label>
                    <input type="text" name="fname" id="fname" value="<?php echo $data['u_fname'] ?>" class="form-control" required />
                </div>
                <div class="col">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="lname" id="lname" value="<?php echo $data['u_lname'] ?>" class="form-control" required />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" id="email" value="<?php echo $data['u_email'] ?>" class="form-control" required />
                </div>
                <div class="col">
                    <label class="form-label">Gender</label>
                    <div class="row ps-3">
                        <?php
                        $rdoM = '';
                        $rdoF = '';
                        $rdoO = '';
                        if ($data['u_gender'] == 'male') {
                            $rdoM = 'checked';
                        } else if ($data['u_gender'] == 'female') {
                            $rdoF = 'checked';
                        } else {
                            $rdoO = 'checked';
                        }
                        ?>
                        <div class="col form-check">
                            <input class="form-check-input" type="radio" value="male" name="rdoGen" id="rdoM" <?php echo $rdoM; ?> />
                            <label class="form-check-label" for="rdoM">
                                Male
                            </label>
                        </div>
                        <div class="col form-check">
                            <input class="form-check-input" type="radio" value="female" name="rdoGen" id="rdoF" <?php echo $rdoF; ?> />
                            <label class="form-check-label" for="rdoF">
                                Female
                            </label>
                        </div>
                        <div class="col form-check">
                            <input class="form-check-input" type="radio" value="other" name="rdoGen" id="rdoO" <?php echo $rdoO; ?> />
                            <label class="form-check-label" for="rdoO">
                                Other
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label">Hobbies</label>
                <div class="row ps-4">
                    <?php
                    $hobbies = explode(',', $data['u_hobbies']);
                    $chkC = '';
                    $chkS = '';
                    $chkD = '';
                    $chkT = '';
                    $chkE = '';
                    foreach ($hobbies as $hobby) {
                        if ($hobby == 'coding') {
                            $chkC = 'checked';
                        } else if ($hobby == 'singing') {
                            $chkS = 'checked';
                        } else if ($hobby == 'dancing') {
                            $chkD = 'checked';
                        } else if ($hobby == 'traveling') {
                            $chkT = 'checked';
                        } else if ($hobby == 'exercising') {
                            $chkE = 'checked';
                        }
                    }
                    ?>
                    <div class="col form-check">
                        <input class="form-check-input" type="checkbox" value="coding" id="chkHob" <?php echo $chkC; ?> />
                        <label class="form-check-label" for="chkHob">
                            Coding
                        </label>
                    </div>
                    <div class="col form-check">
                        <input class="form-check-input" type="checkbox" value="singing" id="chkHob" <?php echo $chkS; ?> />
                        <label class="form-check-label" for="chkHob">
                            Singing
                        </label>
                    </div>
                    <div class="col form-check">
                        <input class="form-check-input" type="checkbox" value="dancing" id="chkHob" <?php echo $chkD; ?> />
                        <label class="form-check-label" for="chkHob">
                            Dancing
                        </label>
                    </div>
                    <div class="col form-check">
                        <input class="form-check-input" type="checkbox" value="traveling" id="chkHob" <?php echo $chkT; ?> />
                        <label class="form-check-label" for="chkHob">
                            Traveling
                        </label>
                    </div>
                    <div class="col form-check">
                        <input class="form-check-input" type="checkbox" value="exercising" id="chkHob" <?php echo $chkE; ?> />
                        <label class="form-check-label" for="chkHob">
                            Exercising
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <input type="submit" name="iEdit" id="iEdit" value="Edit" class="btn btn-success" />
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#iEdit').click(function(e) {
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var email = $('#email').val();
            var rdoGen = $('input[type="radio"]:checked').val();
            var chk = [];
            $('input[type="checkbox"]:checked').each(function() {
                chk.push($(this).val());
            });
            var chkHob = chk.join(',');
            chkHob = chkHob.trim(',');
            $.ajax({
                url: 'backend/updateInfo.php',
                type: 'POST',
                data: {
                    fname: fname,
                    lname: lname,
                    email: email,
                    rdoGen: rdoGen,
                    chkHob: chkHob
                },
                success: function(data) {
                    if (data == 'success') {
                        alert('Details Updated Successfully');
                        window.location.href = 'index.php';
                    } else {
                        alert(data);
                    }
                }
            });
        });
    });
</script>
<?php
include 'includes/footer.php';
?>