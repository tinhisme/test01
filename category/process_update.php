<?php
    require '../config.php';
    require '../core/database.php';
    require '../drivers/MysqlDatabase.php';
    $db = new MysqlDatabase;
    $db->table('category')->update($_POST['id'], 
    [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
    ]
);