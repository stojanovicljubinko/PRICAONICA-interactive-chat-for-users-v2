<?php
use Core\Chat;

require('partials/header.php');

?>
<title>Chat | PRIČAONICA</title>
<link rel='stylesheet prefetch'
    href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link href="css/style.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css/index.css">
<link rel="icon" type="image/png" href="/favicon.png">
<script src="js/chat.js" defer></script>
<script src="js/script.js" defer></script>
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
</style>
</head>

<body class="background_linear_gradient">
    <?php require('partials/container.php'); ?>
    <div class="container">
        <div class="chat" style="margin-top: 5px; padding-bottom: 15px;">
            <div id="frame">
                <div id="sidepanel">
                    <div id="profile">
                        <div class="wrap">
                            <?php
                            $currentSession = '';
                            $currentSession = $user['current_session'];
                            ?>
                            <img id="profile-img" src="<?= $user['avatar'] ?>" class="online" alt="" />
                            <p>
                                <?= $user['username'] ?>
                            </p>
                            <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
                            <div id="status-options">
                                <ul class="shift_left">
                                    <li id="status-online" class="active"><span class="status-circle"></span>
                                        <p>Online</p>
                                    </li>
                                    <li id="status-away"><span class="status-circle"></span>
                                        <p>Away</p>
                                    </li>
                                    <li id="status-busy"><span class="status-circle"></span>
                                        <p>Busy</p>
                                    </li>
                                    <li id="status-offline"><span class="status-circle"></span>
                                        <p>Offline</p>
                                    </li>
                                </ul>
                            </div>
                            <div id="expanded">
                                <div>
                                    <span class="input_item_index ">
                                        <i class="fa fa fa-pencil"></i>
                                    </span>
                                    <input class="form_input_index" id="txt_input_animation_index" type="username"
                                        name="username" placeholder="@<?= $user['status_message'] ?>" readonly>
                                    <br>
                                    <span class="middle_input input_item_index ">
                                        <i class="fa fa-user-circle"></i>
                                    </span>
                                    <input class="form_input_index" id="txt_input_animation_index" type="username"
                                        name="username" placeholder="@<?= $user['username'] ?>" readonly>
                                    <span class="input_item_index end_item_icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                    <input class="form_input_index" id="txt_input_animation_index" type="username"
                                        name="username" placeholder="@<?= $user['email'] ?>" readonly>
                                    <br>
                                </div>
                                <!-- <button
                                class="text-white sidebar_status_text animation_button animation_button2 signup_btn"><?= $user['status_message'] ?></button><br>
                            <button
                                class="text-white sidebar_username_text animation_button animation_button2 signup_btn">@<?= $user['username'] ?></button><br>
                            <button
                                class="text-white sidebar_email_text animation_button animation_button2 signup_btn">@
                                <?= $user['email'] ?></button> -->
                            </div>
                        </div>
                    </div>
                    <div id="search">
                        <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                        <input type="text" placeholder="Search contacts..." class="search-users" />
                    </div>
                    <div id="contacts">
                        <ul class="contact-list">
                            <?php
                            foreach ($chat_users as $user) {
                                $status = 'offline';
                                if ($user['online']) {
                                    $status = 'online';
                                }
                                $activeUser = '';
                                if ($user['userid'] == $currentSession) {
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
                                        <p class="name">
                                            <?= $user['username'] ?><span id="unread_<?= $user['userid'] ?>"
                                                class="unread" <?= $style ?>>
                                                <?= $unreadCount ?>
                                            </span>
                                        </p>
                                        <p class="preview"><span id="isTyping_<?= $user['userid'] ?>"
                                                class="isTyping"></span></p>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div id="bottom-bar">
                        <form method="POST" action="/login">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button style="border: 0em;" class="button_log_out"><i class="fa fa-sign-in"></i>
                                <span>Log out</span></button>
                        </form>
                        <button id="settings" style="border: 0em;" class="settings_button"><i class="fa fa-cog fa-fw"
                                aria-hidden="true"></i>
                            <a href="/settings" class="link_snow">Settings</a></button>
                    </div>
                </div>
                <div class="content" id="content">
                    <div class="contact-profile" id="userSection">
                        <?php if ($init_user): ?>
                        <img src="<?= $init_user['avatar'] ?>" alt="" style="border: 2px solid steelblue" />
                        <p>
                            <?= $init_user['username'] ?>
                        </p>
                        <div class="social-media">
                            <?php if ($init_user['facebook']): ?> <a
                                href="https://www.facebook.com/<?= $init_user['facebook'] ?>" target="_blank"
                                class="icon_style"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <?php endif ?>

                            <?php if ($init_user['github']): ?><a href="https://github.com/<?= $init_user['github'] ?>"
                                class="icon_style" target="_blank" class="icon_style"><i class="fa fa-github"
                                    aria-hidden="true"></i></a>
                            <?php endif ?>

                            <?php if ($init_user['instagram']): ?>
                            <a href="https://www.instagram.com/<?= $init_user['instagram'] ?>" class="icon_style"
                                target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <?php endif ?>
                        </div>
                        <?php
                            $chat = Chat::getSingleChat($_SESSION['user']['userid'], $init_user['userid']);
                            if ($chat):
                                ?>
                        <form action="/chat_download" method="POST">
                            <input type="hidden" name="id" value="<?= $init_user['userid'] ?>">
                            <button type="submit" class="icon_style"
                                style="margin-left: 7px; background: transparent; border: none;"><i
                                    class="fa fa-arrow-circle-o-down" aria-hidden="true"></i></button>
                        </form>
                        <?php endif ?>
                        <?php endif ?>
                    </div>
                    <div class="messages" id="conversation">
                        <?php
                        echo Chat::getUserChat($_SESSION['user']['userid'], $currentSession);
                        ?>
                    </div>
                    <div class="message-input" id="replySection">
                        <div class="message-input" id="replyContainer">
                            <div class="wrap">
                                <input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>"
                                    placeholder="Write your message..." />
                                <button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i
                                        class="fa fa-reply" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require('partials/footer.php'); ?>