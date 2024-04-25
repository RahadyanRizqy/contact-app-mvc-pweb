<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';

// $url = BASEURL . (isset($_GET['url']) ? $_GET['url'] : '');
// $url = str_replace(BASEURL, "", $url);

$url = implode("/", 
            array_values(
                array_filter(
                    explode("/", str_replace('contact-app', "", parse_url($_SERVER['REQUEST_URI'])['path'])), function($element) { 
                        return $element !== ""; 
                    }
                )
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
