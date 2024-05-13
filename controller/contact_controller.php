<?php

include_once 'model/contact_model.php';

class ContactController {
    static function add() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('dash_page/layout', [
                'url' => 'view/contact_crud_page/add',
                'cities' => Contact::rawQuery("SELECT id, city FROM cities")
            ]);
        }
    }

    static function saveAdd() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            $post = array_map('htmlspecialchars', $_POST);
            $contact = Contact::insert([
                'phone_number' => $post['phone_number'], 
                'owner' => $post['owner'],
                'user_fk' => $_SESSION['user']['id'],
                'city_fk' => $post['city']
            ]);
            
            if ($contact) {
                header('Location: '.BASEURL.'dashboard/contacts');
            }
            else {
                header('Location: '.BASEURL.'contacts/add?addFailed=true');
            }
        }
    }

    static function edit() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('dash_page/layout', [
                'url' => 'view/contact_crud_page/edit',
                'contact' => Contact::rawQuery("SELECT c1.id as id, c1.phone_number as phone_number, c1.owner as owner, c2.city as user_city, c2.id as city_fk FROM contacts as c1, cities as c2 WHERE c1.id = ". $_GET['id'] ." AND c1.city_fk = c2.id"),
                'cities' => Contact::rawQuery("SELECT id, city FROM cities")
            ]);
        }
    }

    static function saveEdit() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            $post = array_map('htmlspecialchars', $_POST);
            $contact = Contact::update([
                'id' => $_GET['id'],
                'phone_number' => $post['phone_number'],
                'owner' => $post['owner'],
                'city_fk' => $post['city']
            ]);
            if ($contact) {
                header('Location: '.BASEURL.'dashboard/contacts');
            }
            else {
                header('Location: '.BASEURL.'contacts/edit?id='.$_GET['id'].'&editFailed=true');
            }
        }
    }

    static function remove() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            $contact = Contact::delete($_GET['id']);
            if ($contact) {
                header('Location: '.BASEURL.'dashboard/contacts');
            }
            else {
                header('Location: '.BASEURL.'dashboard/contacts?removeFailed=true');
            }
        }
    }

    static function report() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            $contacts = Contact::rawQuery("SELECT COUNT(c1.id) as user_count, c2.city as user_city FROM contacts as c1, cities as c2 WHERE c1.city_fk = c2.id GROUP BY user_city;");
            if ($contacts) {
                view('component/report', ['contacts' => $contacts]);
            }
            else {
                header('Location: '.BASEURL.'dashboard/contacts?removeFailed=true');
            }
        }
    }

    static function api() {
        $url = 'https://api.coinlore.net/api/tickers/';
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo "Error decoding JSON: " . json_last_error_msg();
        } else {
            var_dump($data['data'][0]['id']);
        }
    }
}