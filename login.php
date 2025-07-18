<!-- صفحة تسجيل الدخول login.html -->
<?php
session_start();
if(isset($_SESSION["user_name"])){
    header("location:PRODUCT.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
require "sqlprod.php";
extract($_POST);
$sql = "SELECT * FROM user WHERE user_name = '$name'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if(password_verify($pass,$row["user_password"])){
        $_SESSION["user_name"] = $row["user_name"];
        $_SESSION["pre_number"] = $row["pre_number"];
        if($_SESSION["pre_number"] == 0)
        header("location:PRODUCT.php");
        else
        header("location:read_product.php");
    }else{
        echo "Username or password is not correct";  
    }
}else{
    echo "Username or password is not correct";
}
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="form-container">
        <h3>تسجيل الدخول</h3>
        <form action="" method="post">
            <label class="form-label">الاسم </label>
            <input type="text" class="form-input" placeholder="أدخل رقم الهاتف" name="name">
            <label class="form-label">كلمة السر</label>
            <input type="password" class="form-input" placeholder="أدخل كلمة السر" name=pass>
            <input type="submit" value="Login">
        </form>
        <p class="text-center">ليس لديك حساب؟ <a href="new_login.php" class="toggle-link">إنشاء حساب جديد</a></p>
    </div>
</body>
</html>