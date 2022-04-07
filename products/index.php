<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<?php
    require '../config.php';
    require '../core/database.php';
    require '../drivers/MysqlDatabase.php';
    $db = new MysqlDatabase;
    $products = $db->table('products')->get();

?>
<body>
    <a href="create.php">Thêm  Sản Phẩm</a>
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Mô Tả</th>
            <th>Tên Danh Mục</th>
            <th>Xoá</th>
            <th>Sửa</th>
        </tr>
        <?php foreach($products as $product){ ?>
        <tr>
            <td><?php echo $product->id ?></td>
            <td><?php echo $product->name ?></td>
            <td><?php echo $product->quantity ?></td>
            <td><?php echo $product->price ?></td>
            <td><?php echo $product->description ?></td>
            <td><?php echo $product->category_id ?></td>
            <td><a href="delete.php?id=<?php echo $product->id ?>">Xoá</a></td>
            <td><a href="update.php?id=<?php echo $product->id ?>">Sửa</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
