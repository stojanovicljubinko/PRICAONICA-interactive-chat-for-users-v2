<?php require base_path('views/partials/header.php') ?>

<head>
    <title>ADMINISTRATOR | PRIČAONICA</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="stylesheet" href="css/index.css">
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
    <div role="navigation" class="navbar_default_background navbar navbar-default navbar-static-top navbar_colour_text">
        <div class="container navbar_container">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle navbar_toggle_border"
                    type="button">
                    <span class="sr-only toggle:hover" id="toggle">Toggle navigation</span>
                    <span class="icon-bar togle_element toggle_button_icon span_icon_bar"></span>
                    <span class="icon-bar togle_element span_icon_bar"></span>
                    <span class="icon-bar togle_element span_icon_bar"></span>
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
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Dodali smo 'navbar-right' klasu ovdje -->
                    <li class="navbar_li">
                        <form method="POST" action="/login" class="form_style">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="button_log_out form_button_border">Log Out</button>
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
            <form action="/settings" method="POST" enctype="multipart/form-data" style="width: 1050px; height: 550px;">
                <div class="con" style="position: absolute; margin-left: 50px;">
                    <div class="form-group">
                        <div class="alert alert-warning">
                        </div>
                        <div class="alert alert-warning">
                        </div>
                    </div>
                    <header class="head-form">
                        <div id="contacts">
                            <ul class="contact-list">
                                <?php 
						foreach ($chat_users as $user) {
							$status = 'offline';						
							if($user['online']) {
								$status = 'online';
							}
							$activeUser = '';
							if($user['userid'] == $currentSession) {
								$activeUser = "active";
							}
						?>
                                <li id="<?= $user['userid'] ?>" class="contact <?= $activeUser ?>"
                                    data-touserid="<?= $user['userid'] ?>" data-tousername="<?= $user['username'] ?>">
                                    <div class="wrap">
                                        <span id="status_<?= $user['userid'] ?>"
                                            class="contact-status <?= $status ?>"></span>
                                        <img src="<?= $user['avatar'] ?>" alt="" style="border: 2px solid white" />
                                        <div class="meta">
                                            <?php
										$unreadCount = Chat::getUnreadMessages($user['userid'], $_SESSION['user']['userid']);
										$style = ($unreadCount > 0) ? 'style="background: red; border: 0px; padding: 0.2em;"' 
                                        : 'style="background: red; border: 0px; padding: 0.2em; display:none"';
									?>
                                            <p class="name"><?= $user['username'] ?><span
                                                    id="unread_<?= $user['userid'] ?>" class="unread"
                                                    <?= $style ?>><?= $unreadCount ?></span></p>
                                            <p class="preview"><span id="isTyping_<?= $user['userid'] ?>"
                                                    class="isTyping"></span></p>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </header>
                    <br>
                    <div class="field-set" style="position: absolute; margin-left: 1300px; margin-top: 5px;">
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
                        <br>
                        <br><br>
                        <button class="log-in" type="submit" name="settings" value="update"> Delete </button>
                    </div>
                </div>
            </form>
        </div>
        <?php require base_path('views/partials/footer.php') ?>