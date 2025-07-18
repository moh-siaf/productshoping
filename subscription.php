<?php
session_start(); // بدء الجلسة
require "sqlprod.php"; // الاتصال بقاعدة البيانات

$message = ""; // لتخزين الرسائل
$email = isset($_SESSION["user_email"]) ? $_SESSION["user_email"] : ""; // جلب البريد من الجلسة
$showUnsubscribe = false; // التحكم في عرض واجهة الاشتراك أو الإلغاء

if (!empty($email)) {
    // التحقق مما إذا كان البريد موجودًا في قاعدة البيانات
    $check_sql = "SELECT * FROM subscribers WHERE email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $showUnsubscribe = $result->num_rows > 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["subscribe"])) {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);

        if (!empty($name) && !empty($email)) {
            // إدخال المشترك إلى قاعدة البيانات
            $insert_sql = "INSERT INTO subscribers (name, email) VALUES (?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("ss", $name, $email);

            if ($stmt->execute()) {
                $_SESSION["user_email"] = $email; // حفظ البريد في الجلسة
                $message = "✅ تم الاشتراك بنجاح!";
                $showUnsubscribe = true;
            } else {
                $message = "❌ حدث خطأ أثناء الاشتراك!";
            }
        } else {
            $message = "⚠️ الرجاء إدخال جميع البيانات!";
        }
    }

    if (isset($_POST["unsubscribe"])) {
        // حذف المشترك من قاعدة البيانات
        $delete_sql = "DELETE FROM subscribers WHERE email = ?";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bind_param("s", $email);

        if ($stmt->execute() && $stmt->affected_rows > 0) {
            unset($_SESSION["user_email"]); // إزالة البريد من الجلسة
            $message = "✅ تم إلغاء الاشتراك بنجاح!";
            $showUnsubscribe = false;
        } else {
            $message = "⚠️ البريد الإلكتروني غير موجود!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاشتراك وإلغاء الاشتراك</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; background: #f4f4f4; }
        .container { background: white; padding: 20px; display: inline-block; border-radius: 10px; width: 40%; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { width: 90%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px; }
        button { padding: 10px 20px; border: none; cursor: pointer; width: 100%; border-radius: 5px; }
        .subscribe-btn { background: green; color: white; margin-top: 10px; }
        .subscribe-btn:hover { background: darkgreen; }
        .unsubscribe-btn { background: red; color: white; margin-top: 10px; }
        .unsubscribe-btn:hover { background: darkred; }
        .message { margin-top: 10px; font-weight: bold; color: red; }
    </style>
</head>
<body>

<div class="container">
    <?php if ($showUnsubscribe): ?>
        <h2>إلغاء الاشتراك</h2>
        <p>أنت مشترك بالفعل باستخدام البريد الإلكتروني: <b><?= htmlspecialchars($email) ?></b></p>
        <form method="POST">
            <button type="submit" name="unsubscribe" class="unsubscribe-btn">إلغاء الاشتراك</button>
        </form>
    <?php else: ?>
        <h2>اشترك في خدماتنا</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="الاسم الكامل" required>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <button type="submit" name="subscribe" class="subscribe-btn">اشتراك</button>
        </form>
    <?php endif; ?>

    <?php if ($message): ?>
        <p class="message"><?= $message; ?></p>
    <?php endif; ?>
</div>

<h2> <a href="PRODUCT.php" class="btn btn-primary me-2">رجوع</a></h2>
