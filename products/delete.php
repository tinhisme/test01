<?php
require '../config.php';
require '../core/database.php';
require '../drivers/MysqlDatabase.php';
$db = new MysqlDatabase;

$db->table('products')->delete($_GET['id']);
