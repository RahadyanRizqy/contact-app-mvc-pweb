<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';

$url = implode("/", 
            array_filter(
                explode("/", 
                    str_replace($_ENV['BASEDIR'], "", 
                        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
                    )
                ), 'strlen'
            )
        );

# GET
route('/', 'get', function () { return view('home'); });

route('login', 'get', 'AuthController::login');
route('register', 'get', 'AuthController::register');

route('dashboard', 'get', 'DashboardController::index');
route('dashboard/admin', 'get', 'DashboardController::admin');
route('dashboard/contacts', 'get', 'DashboardController::contacts');
route('dashboard/logout', 'get', 'AuthController::logout');

route('contacts/add', 'get', 'ContactController::add');
route('contacts/edit', 'get', 'ContactController::edit');
route('contacts/remove', 'get', 'ContactController::remove');

route('freshdb', 'get', 'freshdb');

# POST
route('login', 'post', 'AuthController::saveLogin');
route('register', 'post', 'AuthController::saveRegister');

route('contacts/add', 'post', 'ContactController::saveAdd');
route('contacts/edit', 'post', 'ContactController::saveEdit');

if (!in_array($url, $urls['routes'])) {
    header('Location: '.BASEURL);
}

$call = $urls[$_SERVER['REQUEST_METHOD']][$url];
$call();
