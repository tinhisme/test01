<?php
    require '../config.php';
    require '../core/database.php';
    require '../drivers/MysqlDatabase.php';
    $db = new MysqlDatabase;
    $name = $_POST['name'];
    $description = $_POST['description'];
    $db->table('category')->insert([
            'name' => $name,
            'description' => $description
        ]);