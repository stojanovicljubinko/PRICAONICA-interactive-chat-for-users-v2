<?php
use Core\Chat;

require base_path('views/partials/header.php');

$currentSession = '';
$currentSession = $user['current_session'];
?>

<head>
    <title>ADMINISTRATOR | PRIČAONICA</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/admin.js"></script>
    <!-- <script src="js/chat.js"></script> -->
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

    .contact_list_div:hover {
        background-color: rgba(255, 250, 250, 0.9);
        color: steelblue;
    }

    .contact_list_p:hover {
        color: steelblue;
        font-weight: bold;
    }

    .contact_list_p {
        color: snow;
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

<body style="background-image: linear-gradient(-200deg, steelblue 50%, #F0F0F0		 50%);">
    <?php require base_path('views/partials/container.php') ?>
    <div class="overlay">
        <form action="/administrator" method="POST" enctype="multipart/form-data" style="width: 1050px; height: 550px;">
            <input type="hidden" name="_method" value="DELETE" />
            <div class="con" style="position: absolute; margin-left: 50px;">
                <div class="form-group">
                    <?php if (isset($errors['noperm'])): ?>
                    <div class="alert alert-warning">
                        <?= $errors['noperm'] ?>
                    </div>
                    <?php endif; ?>
                </div>
                <header class="head-form">
                    <div id="contacts-container"
                        style="width: 300px; height: 490px; overflow-y: scroll; cursor: pointer;">
                        <ul class=" contact-list" style="list-style: none; padding: 0; margin: 0;">
                            <?php
                                foreach ($chat_users as $selected_user) {
                                    $status = 'offline';
                                    if ($selected_user['online']) {
                                        $status = 'online';
                                    }
                                    $activeUser = '';
                                    if ($selected_user['userid'] == $currentSession) {
                                        $activeUser = "active";
                                    }
                                    ?>
                            <li id="<?= $selected_user['userid'] ?>" class="user <?= $activeUser ?>"
                                data-touserid="<?= $selected_user['userid'] ?>"
                                data-tousername="<?= $selected_user['username'] ?>">
                                <div class="wrap contact_list_div"
                                    style="display: flex; align-items: center; padding: 10px;">
                                    <span id="status_<?= $selected_user['userid'] ?>"
                                        class="contact-status <?= $status ?>"
                                        style="width: 10px; height: 10px; border-radius: 50%; margin-right: 10px;"></span>
                                    <img src="<?= $selected_user['avatar'] ?>" alt=""
                                        style="border: 2px solid white; width: 50px; height: 50px; border-radius: 50%;" />
                                    <div class="meta" style="flex: 1;">
                                        <p class="name contact_list_p" style="margin: 0; padding: 15px 50px 15px;">
                                            <?= $selected_user['username'] ?>
                                        </p>
                                        <!-- <p class="preview"><span id="isTyping_<?= $selected_user['userid'] ?>"
                                                        class="isTyping"></span></p> -->
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </header>
                <br>
                <div class="cloud cloud--1"></div>
                <div class="cloud cloud--2"></div>
                <div class="cloud cloud--3"></div>
                <div class="cloud cloud--4"></div>
                <div class="duck__wrapper" style="margin-left:50px; margin-top:250px;">
                    <div class="duck">
                        <div class="duck duck__inner">
                            <div class="duck__mouth"></div>
                            <div class="duck__head">
                                <div class="duck__eye"></div>
                                <div class="duck__eye--shadow"></div>
                                <div class="duck__white"></div>
                            </div>
                            <div class="duck__body"></div>
                            <div class="duck__wing"></div>
                        </div>
                        <div class="duck__foot duck__foot--1" style="z-index: 1;"></div>
                        <div class="duck__foot duck__foot--2" style="z-index: 1;"></div>
                        <div class="surface"></div>
                    </div>
                </div>
                <?php $init_user = $chat_users[0] ?>
                <div style="position: absolute; margin-left: 510px; margin-top: 5px; display: grid;
                        grid-template-columns: auto auto auto; gap: 10px;">
                    <input class="form-input"
                        style="background-color: rgba(255, 250, 250, 0.9); width: 140px; height: 140px; border-radius: 8px;"
                        id="txt-input-animation" type="text" name="chats" placeholder="1"
                        value="&#10024; <?= $dashboard['chats'] ?>" readonly>

                    <input class="form-input"
                        style="background-color: rgba(255, 250, 250, 0.9); width: 140px; height: 140px; border-radius: 8px;"
                        id="txt-input-animation" type="text" name="admins" placeholder="2"
                        value="&#128526; <?= $dashboard['admins'] ?>" readonly>
                </div>
                <div style="position: absolute; margin-left: 510px; margin-top: 160px; display: grid;
                        grid-template-columns: auto auto auto; gap: 10px;">
                    <input class="form-input"
                        style="background-color: rgba(255, 250, 250, 0.9); width: 140px; height: 140px; border-radius: 8px;"
                        id="txt-input-animation" type="text" name="mods" placeholder="1"
                        value="&#129312; <?= $dashboard['mods'] ?>" readonly>

                    <input class="form-input"
                        style="background-color: rgba(255, 250, 250, 0.9); width: 140px; height: 140px; border-radius: 8px;"
                        id="txt-input-animation" type="text" name="members" placeholder="2"
                        value="&#128536; <?= $dashboard['members'] ?>" readonly>
                </div>
                <div class="field-set" style="position: absolute; margin-left: 1100px; margin-top: 5px;">
                    <span class="input-item" style="padding: 17px 0px 15.4px 9px;">
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <input class="form-input" id="txt-input-animation" type="text" name="username"
                        placeholder="@UserName" value="<?= $init_user['username'] ?>" readonly>
                    <br>
                    <span class="input-item" style="padding: 17px 0px 15.4px 9px;">
                        <i class="fa fa-envelope-o"></i>
                    </span>
                    <input class="form-input" id="txt-input-animation" type="email" name="email"
                        placeholder="@EmailAdress" value="<?= $init_user['email'] ?>" readonly>
                    <br>
                    <span class="input-item" style="padding: 17px 0px 15.4px 9px;">
                        <i class="fa fa-cog"></i>
                    </span>
                    <input class="form-input" id="txt-input-animation" type="text" name="role" placeholder="@Role"
                        value="<?= $init_user['role'] ?>" readonly>
                    <br>
                    <span class="input-item" style="padding: 17px 0px 15.4px 9px;">
                        <i class="fa fa-pencil shift_left_padding_2"></i>
                    </span>
                    <input class="form-input" id="txt-input-animation" type="text" name="status_message"
                        placeholder="@UserStatus" maxlength="18" value="<?= $init_user['status_message'] ?>" require>
                    <br>
                    <br>
                    <div class="checkbox-wrapper-19" style="display: none">
                        <input type="checkbox" id="cbtest-19" data-userid="<?= $init_user['userid'] ?>"
                            <?= $init_user['allowed'] ? 'checked' : '' ?> />
                        <label for="cbtest-19" class="check-box" style="margin-top: -2px;">
                            <span style="margin-left: 20px; font-size: 14px;">Approved</span>
                        </label>
                    </div>
                    <br><br>
                    <button class="log-in" type="submit" name="delete" value="delete" style="visibility: hidden">
                        Delete </button>
                </div>
        </form>
    </div>
    <?php require base_path('views/partials/footer.php') ?>