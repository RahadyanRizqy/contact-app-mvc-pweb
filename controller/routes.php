<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';


class Router { 
    public static $urls = [];

    function __construct() {
        $url = implode("/", 
            array_filter(
                explode("/", 
                    str_replace($_ENV['BASEDIR'], "", 
                        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
                    )
                ), 'strlen'
            )
        );

        if (!in_array($url, self::$urls['routes'])) {
            header('Location: '.BASEURL);
        }
        
        $call = self::$urls[$_SERVER['REQUEST_METHOD']][$url];
        $call();
    }
    public static function url($url, $method, $callback) {
        if ($url == '/') { $url = ''; }
        self::$urls[strtoupper($method)][$url] = $callback;
        self::$urls['routes'][] = $url;
        self::$urls['routes'] = array_unique(self::$urls['routes']);
    }

}

# GET
Router::url('/', 'get', function () { return view('home'); });
Router::url('login', 'get', 'AuthController::login');
Router::url('register', 'get', 'AuthController::register');
Router::url('dashboard', 'get', 'DashboardController::index');
Router::url('dashboard/admin', 'get', 'DashboardController::admin');
Router::url('dashboard/contacts', 'get', 'DashboardController::contacts');
Router::url('dashboard/logout', 'get', 'AuthController::logout');
Router::url('contacts/add', 'get', 'ContactController::add');
Router::url('contacts/edit', 'get', 'ContactController::edit');
Router::url('contacts/remove', 'get', 'ContactController::remove');
Router::url('freshdb', 'get', 'freshdb');

# POST
Router::url('login', 'post', 'AuthController::saveLogin');
Router::url('register', 'post', 'AuthController::saveRegister');
Router::url('contacts/add', 'post', 'ContactController::saveAdd');
Router::url('contacts/edit', 'post', 'ContactController::saveEdit');

new Router();