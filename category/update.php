<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
</head>
<?php
    require '../config.php';
    require '../core/database.php';
    require '../drivers/MysqlDatabase.php';
    $db = new MysqlDatabase;
    $categories = $db->table('category')->getID($_GET['id']);
    foreach($categories as $categorie)
?>
<body>
    <form action="process_update.php" method="post">
        <div>
            <input type="hidden" name="id" value="<?php echo $categorie->id ?>">
        </div>
        <div>
            <input type="text" name="name" value="<?php echo $categorie->name ?>">
        </div>
        <div>
            <input type="text" name="description" value="<?php echo $categorie->description ?>">
        </div>
        <button>Sửa</button>
</form>
</body>
</html>
