<?php
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "online_store";   

$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>
