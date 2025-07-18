<?php
// اتصال بقاعدة البيانات
require "sqlprod.php";

// التحقق من إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال البيانات من النموذج
    $name_user = $_POST['name_user'];
    $description = $_POST['description'];
    $link = $_POST['link'];

    // معالجة رفع الصورة
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $image_name = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $upload_dir = "img/";  
        
        // التأكد من أن الصورة تم رفعها بنجاح
        if (move_uploaded_file($tmp_name, $upload_dir . $image_name)) {
            $image_path = $upload_dir . $image_name;
         
            $sql = "INSERT INTO products (product_name, product_descrip, product_imag, product_linc) 
                    VALUES ('$name_user', '$description', '$image_path', '$link')";

            if ($conn->query($sql) === TRUE) {
                echo "تمت إضافة المنتج بنجاح!";

            } else {
                echo "خطأ: " . $conn->error;
            }
        } else {
            echo "فشل في رفع الصورة.";
        }
    } else {
        echo "لا يوجد ملف تم رفعه أو حدث خطأ.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة منتج</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>إضافة منتج جديد</h2>
        <form action="ProdAdmn.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name_user" class="form-label">اسم المنتج</label>
                <input type="text" class="form-control" name="name_user" >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">وصف المنتج</label>
                <textarea class="form-control"  name="description" rows="3" ></textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">الصورة</label>
                <input type="file" name="photo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">رابط المنتج</label>
                <input type="text" name="link" >
            </div>
            <button type="submit" class="btn btn-primary">إضافة المنتج</button>
            <a href="read_product.php" class="btn btn-success">رجوع</a>
        </form>
    </div>
</body>
</html>
