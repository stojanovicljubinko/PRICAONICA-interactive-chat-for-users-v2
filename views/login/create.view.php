<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login | PRIČAONICA</title>
    <link rel="stylesheet" href="css/login.css">
    </link>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="icon" type="image/png" href="/favicon.png">
</head>

<body style="background-image: linear-gradient(-200deg, steelblue 50%, #F0F0F0		 50%);"></body>
<div class="overlay">
    <form action="/login" method="POST">
        <div class="con">
            <div class="form-group">
                <?php if (isset($errors['email'])): ?>
                <div class="alert alert-warning">
                    <?= $errors['email'] ?>
                </div>
                <?php endif; ?>

                <?php if (isset($errors['password'])): ?>
                <div class="alert alert-warning">
                    <?= $errors['password'] ?>
                </div>
                <?php endif; ?>

                <?php if (isset($errors['registered'])): ?>
                <div class="alert alert-warning">
                    <?= $errors['registered'] ?>
                </div>
                <?php endif; ?>
                <?php if (isset($errors['not_allowed'])): ?>
                <div class="alert alert-warning">
                    <?= $errors['not_allowed'] ?>
                </div>
                <?php endif; ?>
            </div>
            <header class="head-form">
                <h2 class="header_text" style="font-family: Arial, Helvetica, sans-serif; color: white;">Log In</h2>
                <p style="font-family: Arial, Helvetica, sans-serif; color: black;">login using username or email and
                    password</p>
            </header>
            <br>
            <div class="field-set">
                <span class="input-item">
                    <i class="fa fa-user-circle"></i>
                </span>
                <input class="form-input" id="txt-input-animation" type="username" name="username"
                    placeholder="@UserName" value="<?= old('username') ?>" required>

                <br>


                <span class="input-item">
                    <i class="fa fa-key"></i>
                </span>
                <input class="form-input" type="password" name='password' placeholder="Password" id="pwd" name="pwd"
                    required>

                <span>
                    <i class="fa fa-eye-slash" aria-hidden="true" type="button" id="eye"></i>
                </span>


                <br>
                <button class="log-in" type="submit" name="login"> Log In </button>
            </div>

            <div class="other">
                <a class="btn submits frgt-pass forgot_btn animation_button animation_button2"
                    href="/forgot-password">Forgot Password</a>
                <a class="btn submits sign-up signup_btn animation_button animation_button2" href="/register">Sign Up
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </a>
            </div>
        </div>

    </form>
</div>
<script src="/js/script.js"></script>
<div class="word-container" style="display: flex; justify-content: flex-end; align-items: center;">
    <div class="word powered_text"></div>
    <div class="sistem_text">SISTEM</div>
</div>
<?php require base_path('views/partials/footer.php') ?>