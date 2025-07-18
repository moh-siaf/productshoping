<?php
session_start();
if(!isset($_SESSION["user_name"])){
    header("location:login.php");
}else if($_SESSION["pre_number"] == 0){
    header("location:PRODUCT.php");
}
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    if ($_FILES['photo']['name']) {
        $targetDir = "img/"; // المجلد الذي سيتم حفظ الصورة فيه
        $fileName = basename($_FILES["photo"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
            
            $sql = "UPDATE products SET product_name='$name', product_descrip='$description', product_imag='$targetFilePath',
             product_price='$pric' WHERE product_id=$id";
        } else {
            echo "فشل رفع الصورة.";
            exit();
        }
    } else {
       
        $sql = "UPDATE products SET product_name='$name', product_descrip='$description', product_price='$pric' WHERE product_id=$id";
    }

    // تنفيذ استعلام التحديث
    if (!$conn->query($sql)) {
        die("خطأ في التحديث: " . $conn->error);
    } else {
        echo "تم تحديث المنتج بنجاح.";
    }
    header("location:read_product.php");
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث المنتج</title>
    <link rel="stylesheet" href="ubdit_AND_read.css">
</head>
<body>
    <form action="updet.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name_user" class="form-label">اسم المنتج</label>
            <input type="text" class="form-control" name="name" value="<?= $row['product_name']; ?>" >
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">وصف المنتج</label>
            <input type="text" name="description" value="<?= $row['product_descrip']; ?>" >
        </div>
        
        <div class="mb-3">
            <label for="pric" class="form-label">السعر</label>
            <input type="text" class="form-control" name="pric" value="<?= $row['product_price']; ?>" >
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">الصورة الحالية</label><br>
            <img src="<?= $row['product_imag'] ?>" width="150" alt="الصورة الحالية">
            <input type="file" class="form-control mt-2" name="photo" id="photo">
        </div>
        
        <button type="submit" class="btn btn-primary">تعديل</button>
        <button type="submit" class="btn btn-success"><a href="updet.php"></a>رجوع</button>
    </form>
</body>
</html>
