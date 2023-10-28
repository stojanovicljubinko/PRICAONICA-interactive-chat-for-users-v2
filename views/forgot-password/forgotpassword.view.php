<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Forgot password | PRIČAONICA</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="favicon.png">
</head>

<body style="background-image: linear-gradient(180deg, steelblue 50%, #F0F0F0		 50%);">
    <div class="overlay">
        <form action="/forgot-password" method="POST">
            <div class="con">
                <div class="form-group">
                    <?php if (isset($errors['email'])) : ?>
                    <div class="alert alert-warning"><?= $errors['email'] ?></div>
                    <?php endif; ?>
                </div>

                <header class="head-form">
                    <!-- dodati stilovi-->
                    <h2 class="header_text" style="font-family: Arial, Helvetica, sans-serif; color: white;">Recover
                    </h2>
                    <p style="font-family: Arial, Helvetica, sans-serif; color: black;">the password of your PRIČAONICA
                        account</p>
                </header>
                <br>
                <div class="field-set">
                    <span class="input-item">
                        <i class="fa fa-envelope-o"></i>
                    </span>
                    <input class="form-input" id="txt-input" type="email" name="email" placeholder="@EmailAdress"
                        required>

                    <br>
                    <br>
                    <br>

                    <i class="fa fa-eye-slash" aria-hidden="true" type="button" id="eye" style="display: none;"></i>
                    </span>


                    <br>
                    <button type="button"> Sent an email </button>
                </div>

                <div class="other">
                    <a class="btn submits frgt-pass forgot_btn animation_button animation_button2"
                        href="/forgot-password">Register now</a>
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