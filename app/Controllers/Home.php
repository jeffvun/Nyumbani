<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo ("<h1>Go to the url <span style='color:red'>localhost:8080/properties</span></h1>");
    }
}
