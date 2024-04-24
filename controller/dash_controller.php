<?php

include_once 'model/contact_model.php';

class DashboardController {
    static function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('dash_page/layout', ['url' => 'home']);
        }
    }

    static function admin() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('dash_page/layout', ['url' => 'admin', 'user' => $_SESSION['user']]);
        }
    }

    static function contacts() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('dash_page/layout', ['url' => 'contacts', 'contacts' => Contact::select(), 'user' => $_SESSION['user']]);
        }
    }
}