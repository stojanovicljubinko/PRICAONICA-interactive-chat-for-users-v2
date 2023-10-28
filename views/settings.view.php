<?php

require('partials/header.php');

?>
<title>Settings | PRIČAONICA</title>
<link rel="stylesheet" href="css/login.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="/favicon.png">
<script src="js/chat.js"></script>
<script src="js/script.js"></script>
<style>
.modal-dialog {
    width: 400px;
    margin: 30px auto;
}

.login-text {
    background-color: steelblue;
    color: white;
    padding: 0.4em;
    display: inline-block;
}

.btn-group-vertical>.btn-group:after,
.btn-group-vertical>.btn-group:before,
.btn-toolbar:after,
.btn-toolbar:before,
.clearfix:after,
.clearfix:before,
.container-fluid:after,
.container-fluid:before,
.container:after,
.container:before,
.dl-horizontal dd:after,
.dl-horizontal dd:before,
.form-horizontal .form-group:after,
.form-horizontal .form-group:before,
.modal-footer:after,
.modal-footer:before,
.nav:after,
.nav:before,
.navbar-collapse:after,
.navbar-collapse:before,
.navbar-header:after,
.navbar-header:before,
.navbar:after,
.navbar:before,
.pager:after,
.pager:before,
.panel-body:after,
.panel-body:before,
.row:after,
.row:before {
    display: contents;
    content: " ";
}
</style>
</head>

<body>
    <div role="navigation" class="navbar_default_background navbar navbar-default navbar-static-top"
        style="background: steelblue; border: none">
        <div class="container" style="display: block">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"
                    style="border: 0px;">
                    <span class="sr-only toggle:hover" id="toggle">Toggle navigation</span>
                    <span class="icon-bar togle_element toggle_button_icon" style="background: snow;"></span>
                    <span class="icon-bar togle_element" style="background: snow;"></span>
                    <span class="icon-bar togle_element" style="background: snow;"></span>
                </button>
                <a href="/" class="settings_text navbar-brand">PRIČAONICA:
                    INTERACTIVE CHAT
                    FOR USERS</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="<?= urlIs('/') ? 'active' : '' ?>">
                        <a href="/"
                            style="font-family: Arial;<?= urlIs('/') ? 'background: white; border: 0px; color: steelblue' : 'background: steelblue; border: 0px; color: white' ?>">HOME</a>
                    </li>
                    <li class="<?= urlIs('/settings') ? 'active' : '' ?>">
                        <a href="/settings"
                            style=" font-family: Arial;<?= urlIs('/settings') ? 'background: white; border: 0px; color: steelblue' : 'background: steelblue; border: 0px; color: white' ?>">SETTINGS</a>
                    </li>
                    <?php if($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'moderator'): ?>
                    <li class="<?= urlIs('/administrator') ? 'active' : '' ?>">
                        <a href="/administrator"
                            style=" font-family: Arial;<?= urlIs('/administrator') ? 'background: white; border: 0px; color: steelblue' : 'background: steelblue; border: 0px; color: white' ?>">ADMIN</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Dodali smo 'navbar-right' klasu ovdje -->
                    <li style="padding-right: 5em !important;">
                        <form method="POST" action="/login" style="
                                                                    width: auto;
                                                                    height: auto;
                                                                    border-radius: 0em;
                                                                    margin: 0em;
                                                                    box-shadow: none;
                                                                    padding: 0em;
                                                                    background: transparent;
                                                                    ">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="button_log_out" style="border-radius: 0px;">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>


            <!--/.nav-collapse -->
        </div>
    </div>

    <div class="container" style="min-height:500px;">
        <div class=''>
        </div>

        <body style="background-image: linear-gradient(-200deg, steelblue 50%, #F0F0F0		 50%);"></body>
        <div class="overlay">
            <form action="/settings" method="POST" enctype="multipart/form-data" style="width: 750px; height: 550px;">
                <div class="con" style="position: absolute; margin-left: 50px;">

                    <header class="head-form">
                        <h2 class="header_text" style="font-family: Arial, Helvetica, sans-serif; color: white;">
                            Settings</h2>
                        <p style="font-family: Arial, Helvetica, sans-serif; color: black;">change your profile
                            information here</p>

                        <button id="save_data_information_button" class="log-in" type="submit" name="settings"
                            value="download"> Save
                            your
                            data information </button>
                        <br> <br> <br><br> <br> <br><br> <br> <br><br> <br> <br><br> <br>
                        <div class="form-group">
                            <?php if (isset($errors['avatar'])): ?>
                            <div class=" alert alert-warning" style="border: none; background: snow; color: #FFF;">
                                <?= $errors['avatar'] ?>
                            </div>
                            <?php endif; ?>

                            <?php if (isset($errors['message'])): ?>
                            <div class="alert alert-warning" style="border: none; background: snow; color: #FFF;">
                                <?= $errors['message'] ?>
                            </div>
                            <?php endif; ?>
                            <?php if (isset($errors['success'])): ?>
                            <div class="alert alert-warning" style="border: none; background: snow; color: red;">
                                <?= $errors['success'] ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </header>
                    <br>
                    <div class="field-set" style="position: absolute; margin-left: 690px; margin-top: 5px;">
                        <span class="input-item" style="padding: 17px 0px 15.4px 9px;">
                            <i class="fa fa-user-circle"></i>
                        </span>
                        <input class="form-input" id="txt-input-animation" type="username" name="username"
                            placeholder="@UserName" value="<?= $user['username'] ?>" readonly>

                        <br>

                        <span class="input-item" style="padding: 17px 0px 15.4px 9px;">
                            <i class="fa fa-envelope-o"></i>
                        </span>
                        <input class="form-input" id="txt-input-animation" type="username" name="username"
                            placeholder="@EmailAdress" value="<?= $user['email'] ?>" readonly>


                        <span class="input-item shift_left_padding_6" style="padding: 17px 0px 15.4px 9px;">
                            <i class="fa fa-facebook shift_left_padding_6"></i>
                        </span>
                        <input class="form-input" id="txt-input-animation" type="text" name="facebook"
                            placeholder="@FacebookUsername" value="<?= $user['facebook'] ?>" require>

                        <br>


                        <span class="input-item" style="padding: 17px 0px 15.4px 9px;">
                            <i class="fa fa-github shift_left_padding_2"></i>
                        </span>
                        <input class="form-input" id="txt-input-animation" type="text" name="github"
                            placeholder="@GithubUsername" value="<?= $user['github'] ?>" require>

                        <br>


                        <span class="input-item" style="padding: 17px 0px 15.4px 9px;">
                            <i class="fa fa-instagram shift_left_padding_2"></i>
                        </span>
                        <input class="form-input" id="txt-input-animation" type="text" name="instagram"
                            placeholder="@InstagramUsername" value="<?= $user['instagram'] ?>" require>

                        <br><br>
                        <label for="fileUpload">Upload profile photo</label>
                        <input class="padding_button_file form-input" id="txt-input-animation" type="file" name="avatar"
                            placeholder="@ProfilePhoto" require>

                        <br>
                        <span class="input-item" style="padding: 17px 0px 15.4px 9px;">
                            <i class="fa fa-pencil shift_left_padding_2"></i>
                        </span>
                        <input class="form-input" id="txt-input-animation" type="text" name="status_message"
                            placeholder="@UserStatus" maxlength="18" value="<?= $user['status_message'] ?>" require>

                        <br>


                        <button class="log-in" type="submit" name="settings" value="update"> Update </button>
                    </div>
                </div>

            </form>
        </div>


        <?php require('partials/footer.php'); ?>