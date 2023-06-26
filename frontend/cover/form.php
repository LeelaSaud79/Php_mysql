<?php
    session_start();
    ?>

<!DOCTYPE html>
<html>

<head>
    <title>form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="stylee.css">
</head>

<body>
    <div class="form-container">
        <h2>Sign In</h2>
        <form action="#">
            <div class="form-outline mb-4">
                <input type="email" name="email" id="email" class="form-control" />
                <label for="email" class="form-label">Email</label>
            </div>

            <div class="form-outline mb-4">
                <input type="password" name="password" id="password" class="form-control" autocomplete="new-email" />
                <label for="password" class="form-label">Password</label>
            </div>

            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checked" checked />
                        <label for="checked" class="form-check-label">Remember me</label>
                    </div>
                </div>

                <div class="col">
                    <a href="#">Forget Password</a>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-floating mb-4">Sign in</button>

            <!-- Register button -->
            <div class="text-center">
                <p>Not a member? <a href="#">Register</a></p>
                <p>or sign up with:</p>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>
            </div>
        </form>
    </div>
</body>

</html>