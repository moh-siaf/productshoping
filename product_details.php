<?php
include "sqlprod.php";

// التحقق من وجود المعرف في الرابط
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($id == 0) {
    die("معرف غير صالح");
}

// استعلام للحصول على بيانات المنتج
$sql = "SELECT * FROM products WHERE product_id=$id";
$result = $conn->query($sql);

if (!$result || $result->num_rows == 0) {
    die("المنتج غير موجود");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل المنتج</title>
    <link rel="stylesheet" href="product_details.css"> <!-- ملف التنسيق الخارجي -->
</head>
<body>

    <div class="product-container">
        <div class="product-image">
            <img src="<?= $row['product_imag']; ?>" alt="<?= $row['product_name']; ?>">
        </div>
        <div class="product-details">
            <h2><?= $row['product_name']; ?></h2>
            <p><?= $row['product_descrip']; ?></p>
            <span class="price">السعر: <?= $row['product_price']; ?>$</span>
        </div>
        <div class="product-buttons">
            <a href="#" class="btn order-btn">اطلب الآن</a>
            <a href="PRODUCT.php" class="btn back-btn">العودة إلى المتجر</a>
        </div>
    </div>

</body>
</html>
