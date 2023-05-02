<?php

uri('/', 'HomeController', 'index');
uri('/register', 'UserController', 'registerView');
uri('/login', 'UserController', 'loginView');
uri('/reqregister', 'UserController', 'register', 'POST');
uri("/logout","UserController","logout");
uri('/reqlogin', 'UserController', 'login', 'POST');
uri('/create/item', 'ItemController', 'index');
uri('/ajax/item', 'ItemController', 'ajax');
uri('/created/req/item', 'ItemController', 'create', 'POST');
uri('/update/item/{id}', 'ItemController', 'update', 'POST');
uri('/delete/item/{id}', 'ItemController', 'delete');
