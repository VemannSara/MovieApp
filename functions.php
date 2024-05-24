<?php

function highlight_array($array, $name = 'var')
{
    highlight_string("<?php\n\$$name =\n" . var_export($array, true) . ";\n?>");
}

function redirect($location = 'index.php')
{
    header("Location:$location");
    die;
}

/*-------DATABASE------->*/
function db_connect($db_file_name, $uname = "root", $pw = ""){
    $db = new PDO("mysql:host=localhost:3306;dbname=$db_file_name", $uname, $pw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
 
function db_query($db, $sql, $params = []){
    $query = $db->prepare($sql);
    $query->execute($params);
    return $query->fetchAll();
}
 
function db_execute($db, $sql, $params = []){
    $query = $db->prepare($sql);
    $query->execute($params);
}