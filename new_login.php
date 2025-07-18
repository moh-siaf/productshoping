
<!-- صفحة إنشاء حساب register.html -->

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require "sqlprod.php";
  extract($_POST);
  $pass=password_hash($pass,PASSWORD_DEFAULT);
  $sql = $conn->query("INSERT INTO user (user_name, user_number, user_password)
   VALUES( '$name', '$phon', '$pass')");

if (!$sql) {
    echo "Error: " . $conn->error;
}
 else {
    echo "ok";
    header("location:PRODUCT.php");
}
  }
  ?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="form-container">
        <h3>إنشاء حساب جديد</h3>
        <form action="" method="POST">
            <label class="form-label">الاسم الكامل</label>
            <input type="text" class="form-input" placeholder="أدخل اسمك الكامل" name="name">
            <label class="form-label">رقم الهاتف</label>
            <input type="text" class="form-input" placeholder="أدخل رقم الهاتف" name="phon">
            <label class="form-label">كلمة السر</label>
            <input type="password" class="form-input" placeholder="أدخل كلمة السر" name="pass">
            <!-- <label class="form-label">تأكيد كلمة السر</label>
            <input type="password" class="form-input" placeholder="أكد كلمة السر" > -->
            <input type="submit" value="ublod" name="sendr" >
        </form>
        <p class="text-center">لديك حساب بالفعل؟ <a href="login.php" class="toggle-link">تسجيل الدخول</a></p>
    </div>
</body>
</html>



