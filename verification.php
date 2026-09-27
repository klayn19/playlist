<?php 
    include ('./conn/conn.php');
    session_start();

    if (isset($_SESSION['user_verification_id'])) {
        $userVerificationID = $_SESSION['user_verification_id'];
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
                justify-content: center;
                align-items: center;
                background-image: url("https://png.pngtree.com/background/20210714/original/pngtree-abstract-futuristic-pink-neon-background-with-shiny-light-picture-image_1248522.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                min-height: 100vh;
                background-position: center;
            }

        .verification-form {
            backdrop-filter: blur(100px);
                color: rgb (4, 4, 4);
                padding: 60px;
                width: 510px;
                border: 6px solid;
                border-color: rgba(255, 0, 221, 0.932);
                border-radius: 10px;
                background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQ7Q0H5Hj-jvsRmHZi3l1yQIzWK5P0DryWkhlgwzNOlQ&s");
            }

        .btn {
            width: 100%;
        padding: 7px;
        border: 2px solid ;
        border-color: rgb(125, 53, 193);
        background-color: rgb(205, 154, 249);
        border-radius: 5px;
        font-size: 16px;  
        transition: 0.5s;
        }
        .btn:hover {
            color: rgb(255, 255, 255);
                letter-spacing: 0.25cm;
                background-color: rgb(204, 0, 255);
                box-shadow: 0 0 50px rgb(204, 0, 255);

            }
        .verification-form:hover {
            border: 5px solid rgb(255, 0, 212);
                box-shadow: 0 0 20px #ff00d4, inset 0 0 20px rgb(222, 79, 158);
            }
    
    </style>
</head>
<body>
    
    <div class="main">

        <div class="verification-container">

            <div class="verification-form" id="loginForm">
                <h2 class="text-center">Verification code</h2>
                <p class="text-center">Email verification sent.</p>
                <p class="text-center">Please check your email to Access the playlist.</p>
                
                <form action="./endpoint/add-user.php" method="POST">
                    <input type="text" name="user_verification_id" value="<?= $userVerificationID ?>" hidden>
                    <input type="number" class="form-control text-center" id="verificationCode" name="verification_code">
                    <button type="submit" class="btn btn-secondary login-btn form-control mt-4" name="verify">Verify</button>
                </form>
            </div>

        </div>

    </div>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

</body>
</html>