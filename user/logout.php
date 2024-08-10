<?php
    session_start();
    session_unset(); // ลบข้อมูลทั้งหมดใน SESSION
    session_destroy(); // ทำลาย SESSION

    header('Location: login.php'); // พาผู้ใช้ไปยังหน้า login
    exit();
?>