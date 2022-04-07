<?php
    require '../config.php';
    require '../core/database.php';
    require '../drivers/MysqlDatabase.php';
    $db = new MysqlDatabase;

    $db->table('products')->insert([
            'name' => $_POST['name'],
            'quantity' =>$_POST['quantity'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'category_id' => $_POST['category_id']
    ]);