<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<?php
    require '../config.php';
    require '../core/database.php';
    require '../drivers/MysqlDatabase.php';
    $db = new MysqlDatabase;
    $categories = $db->table('category')->get();
?>
<body>
    <a href="create.php">Thêm Danh Mục Sản Phẩm</a>
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên Danh Mục</th>
            <th>Mô Tả</th>
            <th>Xoá</th>
            <th>Sửa</th>
        </tr>
        <?php foreach($categories as $categorie){ ?>
        <tr>
            <td><?php echo $categorie->id ?></td>
            <td><?php echo $categorie->name ?></td>
            <td><?php echo $categorie->description ?></td>
            <td><a href="delete.php?id=<?php echo $categorie->id ?>">Xoá</a></td>
            <td><a href="update.php?id=<?php echo $categorie->id ?>">Sửa</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
