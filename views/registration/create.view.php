<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register | PRIČAONICA</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="/favicon.png">
</head>

<body style="background-image: linear-gradient(200deg, steelblue 50%, #F0F0F0		 50%);">
    <div class="overlay">
        <form action="/register" method="POST">
            <div class="con">
                <div class="form-group">
                    <?php if (isset($errors['exists'])) : ?>
                    <div class="alert alert-warning"><?= $errors['exists'] ?></div>
                    <?php endif; ?>

                    <?php if (isset($errors['email'])) : ?>
                    <div class="alert alert-warning"><?= $errors['email'] ?></div>
                    <?php endif; ?>

                    <?php if (isset($errors['username'])) : ?>
                    <div class="alert alert-warning"><?= $errors['username'] ?></div>
                    <?php endif; ?>

                    <?php if (isset($errors['password'])) : ?>
                    <div class="alert alert-warning"><?= $errors['password'] ?></div>
                    <?php endif; ?>
                </div>

                <header class="head-form">
                    <!-- dodati stilovi-->
                    <h2 class="header_text" style="font-family: Arial, Helvetica, sans-serif; color: white;">Register
                    </h2>
                    <p style="font-family: Arial, Helvetica, sans-serif; color: black;">create a PRIČAONICA account here
                    </p>
                </header>
                <br>
                <div class="field-set">
                    <span class="input-item">
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <input class="form-input" id="txt-input" type="username" name="username" placeholder="@UserName"
                        value="<?= old('username') ?>" required>

                    <br>

                    <span class="input-item">
                        <i class="fa fa-envelope-o"></i>
                    </span>
                    <input class="form-input" id="txt-input" type="email" name="email" placeholder="@EmailAdress"
                        value="<?= old('email') ?>" required>

                    <br>


                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <input class="form-input" type="password" placeholder="Password" id="pwd" name="pwd" required>

                    <span>
                        <i class="fa fa-eye-slash" aria-hidden="true" type="button" id="eye"></i>
                    </span>


                    <br>
                    <button class="log-in" type="submit" name="login"> Sign up </button>
                </div>

                <div class="other">
                    <a class="btn submits frgt-pass forgot_btn animation_button animation_button2"
                        href="/forgot-password">Forgot Password</a>
                    <a class="btn submits sign-up signup_btn animation_button animation_button2" href="/login">Sign In
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <script src="/js/script.js"></script>
    <div class="word-container" style="display: flex; justify-content: flex-start; align-items: center;">
        <div class="word register_powered_text"></div>
        <div class="register_sistem_text">SISTEM</div>
    </div>
    <?php require base_path('views/partials/footer.php') ?>