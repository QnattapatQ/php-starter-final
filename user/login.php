<?php
session_start();
include('../connectdb.php');
// include('../admin/navbar.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // ตรวจสอบว่ามีฟิลด์ใดที่ว่างหรือไม่
        if (empty($username) || empty($password)) {
            $_SESSION['error'] = "กรุณากรอกชื่อผู้ใช้และรหัสผ่าน!";
            header('Location: login.php');
            exit();
        }

         // ตรวจสอบว่ามีผู้ใช้ที่มี Username ตรงกันหรือไม่
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

         // ถ้าพบผู้ใช้และรหัสผ่านถูกต้อง $user && password_verify($password, $user['password'])
        if ($user && $password) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role_id'] = $user['role_id'];

            // ตรวจสอบ Role เพื่อนำไปสู่หน้าที่ถูกต้อง
            if ($user['role_id'] == 1) {
                header('Location: home.php');
            } else if ($user['role_id'] == 2) {
                header('Location: ../admin/home_admin.php');
            }
            exit();
        } else {
            // ถ้า Username หรือ Password ไม่ถูกต้อง
            $_SESSION['error'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!";
            header('Location: login.php');
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
    <title>Login</title>
</head>
<body>
    <form class="container mt-5" method="POST">
        <div>
            <h2>เข้าสู่ระบบ</h2>
        </div>
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <a href="register.php">สมัครสมาชิก</a>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
    </form>
</body>
</html>