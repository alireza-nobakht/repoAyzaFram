<?php

class UsernameController {
    function __construct() {

    }

    public function index($params){
        echo '<h1>hi this is index page of user</h1>';
        var_dump($params);
    }

    public function page($params){
        echo '<h1>hi this is one page of user</h1>';
        var_dump($params);
    }
}
