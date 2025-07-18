<?php

session_start();
if(!isset($_SESSION["user_name"])){
    header("location:login.php");
}else if($_SESSION["pre_number"] == 0){
    header("location:PRODUCT.php");
}

require "sqlprod.php";

// استعلام للحصول على جميع المنتجات
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المنتجات</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="ubdit_AND_read.cses">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">إدارة المنتجات</h2>
        <div class="header">


        <header class="bg-light py-3">
        <div class="container">
            <div class="d-flex justify-content-end">
            <a href="loginut.php" class="btn btn-primary me-2"> خروج</a>
                <a href="PRODUCT.php" class="btn btn-secondary me-2"> الدخول كمستخدم</a>
                <a href="ProdAdmn.php" class="btn btn-success"> إضافةمنتج جديد</a>
            </div>
        </div>
    </header>
    </div>
        
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>الرقم</th>
                    <th>الصورة</th>
                    <th>اسم المنتج</th>
                    <th>الوصف</th>
                    <th>السعر</th>
                    <th>تاريخ الاضافه</th>
                    <th>تاريخ التعديل</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['product_id']; ?></td>
                            <td><img src="<?php echo $row['product_imag']; ?>" width="100" alt="صورة المنتج"></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['product_descrip']; ?></td>
                            <td><?php echo $row['product_price']; ?> $</td>
                            <td><?php echo $row['created_at']; ?> </td>
                            <td><?php echo $row['updated_at']; ?> </td>
                            <td>
                               
                                <a href="updet.php?id=<?= $row['product_id'] ?>" class="btn btn-warning"> تعديل</a>
                               <?php if($_SESSION["pre_number"] == 2){?>       
                                <a href="delet_product.php?id=<?= $row['product_id'] ?>" class="btn btn-danger">حذف</a>
                               <?php
                            } 
                            ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">لا توجد منتجات متاحة.</td>
                    </tr>
                <?php endif; ?>
            
            </tbody>
        </table>
       
    </div>
</body>
</html>
