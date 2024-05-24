<?php

require_once 'functions.php';

function get_all_movies(){
    $db = db_connect('movieapp');
    $query = 'select * from movies';
    return db_query($db, $query);
}

function get_movie_by_id($id){
    $db = db_connect('movieapp');
    $query = 'select * from movies where id = :id';
    $params = [
        'id' => $id,
    ];
    return db_query($db, $query, $params);
}

function add_new_movie($title = '', $year = 0, $director = ''){
    $db = db_connect('movieapp');
    $query = 'insert into movies (Title, Year, Director) values (:Title, :Year, :Director)';
    $params = [
        'Title' => $title,
        'Year' => $year,
        'Director' => $director
    ];
    return db_query($db, $query, $params);
}

function delete_movie($id = 0){
    $db = db_connect('movieapp');
    $query = 'delete from movies where Id = :Id';
    $params = [
        'Id' => $id
    ];
    return db_query($db, $query, $params);
}

function edit_movie($id = '', $title = '', $year = 0, $director = ''){
    $db = db_connect('movieapp');
    $query = 'update movies set Title=:Title, Year=:Year, Director=:Director where Id=:Id';
    $params = [
        'Id' => $id,
        'Title' => $title,
        'Year' => $year,
        'Director' => $director
    ];
    return db_query($db, $query, $params);
}

function add_new_user($name = '', $hashed_password = '', $role = 'normal'){
    $db = db_connect('movieapp');
    $query = 'insert into users (name, password, role) values (:name, :password, :role)';
    $params = [
        'name' => $name,
        'password' => $hashed_password,
        'role' => $role
    ];
    return db_query($db, $query, $params);
}

function get_userdata($username){
    $db = db_connect('movieapp');
    $query = 'select * from users where name = :name';
    $params = [
        'name' => $username,
    ];
    return db_query($db, $query, $params);
}

function get_all_users(){
    $db = db_connect('movieapp');
    $query = 'select * from users';
    return db_query($db, $query);
}

function edit_user($name = '', $role = ''){
    $db = db_connect('movieapp');
    $query = 'update users set role=:role where name=:name';
    $params = [
        'name' => $name,
        'role' => $role
    ];
    return db_query($db, $query, $params);
}