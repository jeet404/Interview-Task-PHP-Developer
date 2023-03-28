<?php
require_once 'DB\connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LogIn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 flex-row">
        <div class="row d-flex justify-content-center align-items-center">
            <form class="bg-info shadow rounded col-md-4 p-5">
                <h1 class="text-light col-md-12 mb-5 text-center border-bottom pb-3">LogIn</h1>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required />
                </div>
                <div class="mb-3">
                    <input type="submit" name="iLogin" value="Login" class="btn btn-light" />
                </div>
                <a href="signup.php" class="nav-link text-success text-end"><u>Create new account</u></a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function(e) {
                e.preventDefault();
                var email = $("input[name=email]").val();
                var password = $("input[name=password]").val();
                $.ajax({
                    url: "backend/loginProcess.php",
                    type: "POST",
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(data) {
                        if (data == "success") {
                            window.location.href = "index.php";
                        } else {
                            alert(data);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>