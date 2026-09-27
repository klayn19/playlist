<?php include ('./conn/conn.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        <style>
            * { 
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
                background-image: url("");
                box-sizing: border-box;
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

            .login-form, .registration-form{
                backdrop-filter: blur(100px);
                color: rgb (4, 4, 4);
                padding: 60px;
                width: 510px;
                border: 6px solid;
                border-color: rgba(0, 0, 0, 0.932);
                border-radius: 10px;
                background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQ7Q0H5Hj-jvsRmHZi3l1yQIzWK5P0DryWkhlgwzNOlQ&s");
            }

            .verification-form {
                backdrop-filter: blur(100px);
                color: rgb(255, 255, 255);
                padding: 40px;
                width: 500px;
                border: 2px solid;
                border-radius: 10px;
            }

            .login-form:hover , .registration-form:hover{
                border: 5px solid rgb(255, 0, 212);
                box-shadow: 0 0 20px #ff00d4, inset 0 0 20px rgb(222, 79, 158);
            }

            .form-group input{
                width: 100%;
                padding: 9px;
                border: 1px solid #000000;
                border-radius: 5px;
                font-size: 16px;
            }

            .ButtonLogin , .ButtonRegister{
                width: 80%;
                padding: 7px;
                border: 2px solid ;
                border-radius: 5px;
                font-size: 16px;  
                transition: 0.6s;
                cursor: pointer;
                border-color: rgb(116, 0, 98);
                background-color: rgb(217, 121, 255);
                position: relative;
                overflow: hidden;
            }

            .ButtonLogin:hover , .ButtonRegister:hover{
                color: rgb(255, 255, 255);
                letter-spacing: 0.25cm;
                background-color: rgb(204, 0, 255);
                box-shadow: 0 0 50px rgb(204, 0, 255);

            }

            .switch-form-link, .showPassword{
                text-decoration: underline;
                cursor: pointer;
                color:rgb(255, 255, 255)
            } 

            .switch-form-link:hover, .showPassword:hover{
                color: rgb(0, 0, 0);
                transition: 0.4s;
                letter-spacing: 0.055cm;
            }



    </style>
</head>
<body>
    
    <div class="main">

        <div class="login-container">
            <div class="login-form" id="loginForm">
                <h2 class="text-center">Log in</h2>
                <p class="text-center">Log-in to Access the Playlist</p>
                <form action="./endpoint/login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" require>
                    </div>
                    <div class="form-group">
                    <label for="password">Enter Password</label>
                    <input type="password" class="form-control passwordField" id="password" name="password" required>

                    <br>

                    <p style="margin-top:5px;"><span onclick="togglePasswordVisibility('#password', '.passwordSpan')" class="passwordSpan showPassword">Show Password</span></p>
                    </div>


                    <p style="text-align: center;">Not yet a member? <span class="switch-form-link" onclick="showRegistrationForm()">Sign Up Now</span></p>
                    
                    <br>

                    <p style="text-align: center;"><button type="submit" class="ButtonLogin" >Log in </button></p>
                </form>
            </div>
        </div>

        <div class="registration-form" id="registrationForm">
            <h2 class="text-center">Register an Account</h2>
            <p class="text-center">Fill in your Personal Information.</p>
            <form action="./endpoint/add-user.php" method="POST">
                <div class="form-group registration row">

                    <div class="col-6">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="first_name">
                    </div>

                    <div class="col-6">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="last_name">
                    </div>
                </div>

                <div class="form-group registration row">
                    <div class="col-5">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="number" class="form-control" id="contactNumber" name="contact_number" maxlength="11">
                    </div>

                    <div class="col-7">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>

                <div class="form-group registration">
                    <label for="registerUsername">Username:</label>
                    <input type="text" class="form-control" id="registerUsername" name="username">
                </div>

                <div class="form-group registration">
                <label for="registerPassword">Password</label>
                <input type="password" class="form-control" id="registerPassword" name="password" required>
                <p style="margin-top:5px;"><span onclick="togglePasswordVisibility('#registerPassword', '.regPasswordSpan')" class="regPasswordSpan showPassword">  Show Password</span></p>
                </div>


                <p style="text-align: right;">Already have an account?<span class="switch-form-link" onclick="showLoginForm()">Sign In</span></p>

                <br>
                <br>

                <p style="text-align: center;"><button type="submit" class="ButtonRegister" name="register">Register</button>


            </form>

        </div>

    </div>

    <script>
        const loginForm = document.getElementById('loginForm');
        const registrationForm = document.getElementById('registrationForm');

        registrationForm.style.display = "none";


        function showRegistrationForm() {
            registrationForm.style.display = "";
            loginForm.style.display = "none";
        }

        function showLoginForm() {
            registrationForm.style.display = "none";
            loginForm.style.display = "";
        }

        function sendVerificationCode() {
            const registrationElements = document.querySelectorAll('.registration');

            registrationElements.forEach(element => {
                element.style.display = 'none';
            });

            const verification = document.querySelector('.verification');
            if (verification) {
                verification.style.display = 'none';
            }
        }

        function togglePasswordVisibility(element, label) {
                 const passwordField = document.querySelector(element);
                 const fieldType = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                 passwordField.setAttribute('type', fieldType);
                 const showPasswordSpan = document.querySelector(label);
                 showPasswordSpan.textContent = fieldType === 'password' ? 'Show Password' : 'Hide Password';
             }


    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

</body>
</html>