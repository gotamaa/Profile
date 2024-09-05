<?php

use Illuminate\Support\Facades\Route;


route::get('/', function () {
    return view('todo');
});

route::get('/register', function () {
    return view('register');
});
