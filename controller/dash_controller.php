<?php

include_once 'model/contact_model.php';

class DashboardController {
    static function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('dash_page/layout', [
                'url' => 'home',
                'statistic' => Contact::rawQuery("SELECT COUNT(c1.id) as user_count, c2.city as user_city FROM contacts as c1, cities as c2 WHERE c1.city_fk = c2.id GROUP BY user_city;")
            ]);
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
            view('dash_page/layout', ['url' => 'contacts', 'contacts' => Contact::rawQuery("SELECT c1.phone_number as phone_number, c1.owner as owner, c2.city as city, c1.deleted_at as deleted_at, c1.user_fk as user_fk, c1.id as id FROM contacts as c1, cities as c2 WHERE c1.city_fk = c2.id;"), 'user' => $_SESSION['user']]);
        }
    }
}