<?php
    require '../config.php';
    require '../core/database.php';
    require '../drivers/MysqlDatabase.php';
    $db = new MysqlDatabase;
    $categories = $db->table('category')->get();
    foreach($categories as $categorie)
?>
<form action="process_create.php" method="post">
    <div>
        <input type="text" name="name" placeholder="Tên Sản Phẩm">
    </div>
    <div>
        <input type="text" name="quantity" placeholder="Số Lượng">
    </div>
    <div>
        <input type="text" name="price" placeholder="Giá">
    </div>
    <div>
        <input type="text" name="description" placeholder="Mô Tả">
    </div>
    <div>
        <select name="category_id" >
                <?php
                    foreach($categories as $categorie){
                ?>
                        <option value="<?php echo $categorie->id ?>">
                            <?php echo $categorie->name ?>
                        </option>
                <?php
                    }
                ?>
        </select>
    </div>
    <button>Thêm</button>
</form>