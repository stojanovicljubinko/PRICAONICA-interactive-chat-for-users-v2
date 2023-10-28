<div role="navigation" class="navbar_default_background navbar navbar-default navbar-static-top"
    style="background: steelblue; border: none">
    <div class="container" style="display: block">
        <div class="navbar-header">
            <?php
                $currentSession = '';
                $currentSession = $user['current_session'];
                ?>
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
                <?php if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'moderator'): ?>
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