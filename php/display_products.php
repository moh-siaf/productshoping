<?php
// اتصال بقاعدة البيانات
require "sqlprod.php";


// استعلام للحصول على جميع المنتجات
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>


    
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): 
            if (!empty($product_image) && file_exists("img/" . $product_image)) {
            $image_path = "img/" . $product_image;} 
            ?>
                    <div class="gallary_image">
                        <div class="product-card">
                            <img src="<?php echo $row['product_imag']; ?>" alt="<?php echo $row['name']; ?>">
                            <h3><?php echo $row['product_imag']; ?></h3>
                            <p><?php echo $row['product_descrip']; ?></p>
                            <a href="#" class="gallary_btn">اطلب الآن</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>لا توجد منتجات متاحة.</p>
            <?php endif; ?>
        </div>
    </div>


<?php
// إغلاق الاتصال بقاعدة البيانا
?>
