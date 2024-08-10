<?php
session_start();
include('../connectdb.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password)) {
            $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบทุกช่อง!";
            header('Location: register.php');
            exit();
        }

        $email_check_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $email_check_result = mysqli_query($conn, $email_check_query);

        if (mysqli_num_rows($email_check_result) > 0) {
            $_SESSION['error'] = "อีเมลนี้ถูกใช้แล้ว กรุณาใช้อีเมลอื่น!";
            header('Location: register.php');
            exit();
        }


        $username_check_query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $username_check_result = mysqli_query($conn, $username_check_query);

        if (mysqli_num_rows($username_check_result) > 0) {
            $_SESSION['error'] = "ชื่อผู้ใช้นี้ถูกใช้แล้ว กรุณาใช้ชื่อผู้ใช้อื่น!";
            header('Location: register.php');
            exit();
        }

        // $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (first_name, last_name, email, username, password, role_id) VALUES ('$first_name', '$last_name', '$email', '$username', '$password', 1)";
        
        if (mysqli_query($conn, $query)) {
            $_SESSION['success'] = "ลงทะเบียนสำเร็จ! กรุณาเข้าสู่ระบบ";
            header('Location: login.php');
            exit();
        } else {
            $_SESSION['error'] = "เกิดข้อผิดพลาด: " . mysqli_error($conn);
            header('Location: register.php');
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <form class="container mt-5" action="register.php" method="POST">
        <div>
            <h2>สมัครสมาชิก</h2>
        </div>
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <div>
            <div class="mb-3">
                <label class="form-label">ชื่อจริง</label>
                <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
            </div>
            <div class="mb-3">
                <label class="form-label">นามสกุล</label>
                <input type="text" name="last_name" class="form-control" id="exampleInputPassword1" require>
            </div>
            <div class="mb-3">
                <label class="form-label">อีเมล</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword1" require>
            </div>
            <div class="mb-3">
                <label class="form-label">ชื่อผู้ใช้</label>
                <input type="text" name="username" class="form-control" id="exampleInputPassword1" require>
            </div>
            <div class="mb-3">
                <label class="form-label">รหัสผ่าน</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" require>
            </div>
        </div>
        <div class="mb-3">
            <a href="login.php">สมัครสมาชิก</a>
        </div>
        <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
    </form>
</body>
</html>