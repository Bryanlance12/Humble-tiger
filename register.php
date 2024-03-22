<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
<div class="bg-image" style="background-image: url('img/bg3.png'); height: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-white mt-5">Register Form</h2>
                <div class="text-center mb-5 text-dark"></div>
                <div class="card my-5">
                    <form id="registerForm" class="card-body cardbody-color p-lg-5">
                        <div class="text-center">
                            <img src="img/logo.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="User Name">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="text-center">
                            <button type="button" onclick="register()" class="btn btn-outline-primary px-5 mb-5 w-100">Register</button>
                        </div>
                        <div class="form-text text-center mb-5 text-dark">Already Registered? <a href="index.php" class="text-dark fw-bold"> Login Here</a></div>
                        <p id="registerMessage" class="text-center text-muted"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    function register() {
        var formData = new FormData(document.getElementById("registerForm"));
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    document.getElementById("registerMessage").innerText = response.message;
                    if (response.success) {
                        window.location.href = "dashboard.php"; // Redirect on successful registration
                    }
                } else {
                    console.log("Error: " + xhr.status);
                }
            }
        };
        xhr.open("POST", "register-process.php", true);
        xhr.send(formData);
    }
</script>
</body>
</html>
