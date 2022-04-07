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
    $products = $db->table('products')->getID($_GET['id']);
    $categories = $db->table('category')->get();
    foreach($products as $product)
?>
<body>
    <form action="process_update.php" method="post">
        <div>
            <input type="hidden" name="id" value="<?php echo $product->id ?>">
        </div>
        <div>
            <input type="text" name="name" value="<?php echo $product->name ?>">
        </div>
        <div>
            <input type="text" name="quantity" value="<?php echo $product->quantity ?>">
        </div>
        <div>
            <input type="text" name="price" value="<?php echo $product->price ?>">
        </div>
        <div>
            <input type="text" name="description" value="<?php echo $product->description ?>">
        </div>
        <div>
        <select name="category_id">
                <?php
                    foreach($categories as $categorie){
                ?>
                        <option value="<?php echo $categorie->id ?>"
                             <?php if($product->category_id == $categorie->id){ ?>
                                selected
                                <?php }?>
                        >
                            <?php echo $categorie->name ?>
                        </option>
                <?php
                    }
                ?>
            </select>
        </div>
        <button>Sửa</button>
</form>
</body>
</html>