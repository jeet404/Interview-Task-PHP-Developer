<?php
require_once 'DB\connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 flex-row">
        <div class="row d-flex justify-content-center align-items-center">
            <form class="bg-info shadow rounded col-md-6 p-5" method="post">
                <h1 class="text-light col-md-12 mb-5 text-center border-bottom pb-3">SignUp</h1>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" required />
                    </div>
                    <div class="col">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" required />
                    </div>
                    <div class="col">
                        <label class="form-label">Gender</label>
                        <div class="row ps-3">
                            <div class="col form-check">
                                <input class="form-check-input" type="radio" value="male" name="rdoGen" id="rdoM">
                                <label class="form-check-label" for="rdoM">
                                    Male
                                </label>
                            </div>
                            <div class="col form-check">
                                <input class="form-check-input" type="radio" value="female" name="rdoGen" id="rdoF">
                                <label class="form-check-label" for="rdoF">
                                    Female
                                </label>
                            </div>
                            <div class="col form-check">
                                <input class="form-check-input" type="radio" value="other" name="rdoGen" id="rdoO">
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
                        <div class="col form-check">
                            <input class="form-check-input" type="checkbox" value="coding" id="chkHob">
                            <label class="form-check-label" for="chkHob">
                                Coding
                            </label>
                        </div>
                        <div class="col form-check">
                            <input class="form-check-input" type="checkbox" value="singing" id="chkHob">
                            <label class="form-check-label" for="chkHob">
                                Singing
                            </label>
                        </div>
                        <div class="col form-check">
                            <input class="form-check-input" type="checkbox" value="dancing" id="chkHob">
                            <label class="form-check-label" for="chkHob">
                                Dancing
                            </label>
                        </div>
                        <div class="col form-check">
                            <input class="form-check-input" type="checkbox" value="traveling" id="chkHob">
                            <label class="form-check-label" for="chkHob">
                                Traveling
                            </label>
                        </div>
                        <div class="col form-check">
                            <input class="form-check-input" type="checkbox" value="exercising" id="chkHob">
                            <label class="form-check-label" for="chkHob">
                                Exercising
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required />
                    </div>
                    <div class="col">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control" required />
                    </div>
                </div>
                <div class="mb-3">
                    <input type="submit" name="iSignup" id="iLogin" value="SignUp" class="btn btn-light" />
                </div>
                <a href="login.php" class="nav-link text-success text-end"><u>Already have an account</u></a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#iSignup").click(function() {
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var email = $("#email").val();
                var rdoGen = $('input[type="radio"]:checked').val();
                var password = $("#password").val();
                var cpassword = $("#cpassword").val();
                var uppercase = /[A-Z]/g;
                var lowercase = /[a-z]/g;
                var number = /[0-9]/g;
                var chk = [];
                $('input[type="checkbox"]:checked').each(function() {
                    chk.push($(this).val());
                });
                var chkHob = chk.join(',');
                chkHob = chkHob.trim(',');
                if (fname == '' || lname == '' || email == '' || rdoGen == '' || chkHob == '' || password == '' || cpassword == '') {
                    alert("Please fill all fields...!!!!!!");
                } else if (!(password.match(uppercase) && password.match(lowercase) && password.match(number))) {
                    alert("Password should contain atleast one uppercase, one lowercase and one number...!!!!!!");
                } else if (!(password).match(cpassword)) {
                    alert("Your passwords don't match. Try again?");
                } else {
                    $.ajax({
                        type: "post",
                        url: "backend/registration.php",
                        data: {
                            fname: fname,
                            lname: lname,
                            email: email,
                            rdoGen: rdoGen,
                            chkHob: chkHob,
                            password: password,
                        },
                        success: function(response) {
                            if (response == "success") {
                                alert("Registration Successful");
                                window.location.href = "login.php";
                            } else {
                                alert(response);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>