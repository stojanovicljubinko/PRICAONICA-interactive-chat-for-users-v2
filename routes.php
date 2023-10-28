<?php

$router->get('/', 'index.php')->only('auth');

$router->post('/', 'chat/chat_data.php')->only('auth');
$router->post('/chat_download', 'chat/chat_download.php')->only('auth');
$router->post('/send', 'chat/send.php')->only('auth');
$router->post('/search_contacts', 'chat/search_contacts.php')->only('auth');
$router->post('/show_chat', 'chat/show_chat.php')->only('auth');
$router->post('/update_user_list', 'chat/update_user_list.php')->only('auth');
$router->post('/update_user_chat', 'chat/update_user_chat.php')->only('auth');
$router->post('/update_unread_message', 'chat/update_unread_message.php')->only('auth');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/forgot-password', 'forgotpassword/create.php')->only('guest');
$router->post('/forgot-password', 'forgotpassword/send.php')->only('guest');

$router->get('/login', 'login/create.php')->only('guest');
$router->post('/login', 'login/store.php')->only('guest');
$router->delete('/login', 'login/destroy.php')->only('auth');

$router->get('/settings', 'settings/create.php')->only('auth');
$router->post('/settings', 'settings/store.php')->only('auth');

$router->get('/administrator', 'administrator/index.php')->only('mod');
$router->post('/show_data', 'administrator/show_data.php')->only('mod');
$router->post('/approve_user', 'administrator/approve_user.php')->only('mod');
$router->delete('/administrator', 'administrator/destroy.php')->only('mod');