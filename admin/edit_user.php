<?php 
    // session_start();
    include('sidebar.php');
    include('../connectdb.php');

    $userId = $_GET["userId"];

    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $sql);

    $user_row = mysqli_fetch_assoc($result);

    

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     // รับค่าจากฟอร์ม
    //     $first_name = $_POST['first_name'];
    //     $last_name = $_POST['last_name'];
    //     $email = $_POST['email'];
    //     $username = $_POST['username'];

    //     // ตรวจสอบว่าค่าที่กรอกมาไม่เป็นค่าว่าง
    //     if (empty($first_name) || empty($last_name) || empty($email) || empty($username)) {
    //         echo "<script>
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'เกิดข้อผิดพลาด!',
    //                 text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
    //             });
    //         </script>";
    //     } else {
    //         // ตรวจสอบ email และ username ที่ซ้ำกันในฐานข้อมูล
    //         $check_sql = "SELECT * FROM users WHERE (email = '$email' OR username = '$username') AND id != $userId";
    //         $check_result = mysqli_query($conn, $check_sql);

    //         if (mysqli_num_rows($check_result) > 0) {
    //             // หากพบข้อมูลซ้ำ
    //             echo "<script>
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'เกิดข้อผิดพลาด!',
    //                     text: 'อีเมลหรือชื่อผู้ใช้มีอยู่ในระบบแล้ว',
    //                 });
    //             </script>";
    //         } else {
    //             // ถ้าข้อมูลถูกต้อง แสดง SweetAlert2 เพื่อยืนยันการบันทึก
    //             echo "<script>
    //                 Swal.fire({
    //                     title: 'ยืนยันการบันทึก?',
    //                     text: 'คุณแน่ใจหรือไม่ว่าต้องการบันทึกข้อมูลนี้?',
    //                     icon: 'warning',
    //                     showCancelButton: true,
    //                     confirmButtonColor: '#3085d6',
    //                     cancelButtonColor: '#d33',
    //                     confirmButtonText: 'ใช่, บันทึกข้อมูล!',
    //                     cancelButtonText: 'ยกเลิก'
    //                 }).then((result) => {
    //                     if (result.isConfirmed) {
    //                         // ส่งฟอร์มเมื่อกดยืนยัน
    //                         document.getElementById('editForm').submit();
    //                     }
    //                 });
    //             </script>";
    //         }
    //     }
    // }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขผู้ใช้</title>
</head>
<body>
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
        <div class="row">
            <div class=""> <!-- col-12 col-xl-8 mb-4 mb-lg-0 -->
                <div class="card">
                    <h2 class="card-header">แก้ไขข้อมูล</h2>
                    <div class="card-body">
                        <form class="container mt-5" action="edit_user.php" method="POST">
                            <div>
                                <h2>ข้อมูลของผู้ใช้</h2>
                            </div>
                            <div>
                                <div class="d-flex">
                                    <div class="mb-3 w-100 mr-4">
                                        <label class="form-label">ชื่อจริง</label>
                                        <input type="text" name="first_name" value="<?php echo $user_row["first_name"] ?>" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" require>
                                    </div>
                                    <div class="mb-3 w-100">
                                        <label class="form-label">นามสกุล</label>
                                        <input type="text" name="last_name" value="<?php echo $user_row["last_name"] ?>" class="form-control w-100" id="exampleInputPassword1" require>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">อีเมล</label>
                                    <input type="email" name="email" value="<?php echo $user_row["email"] ?>" class="form-control" id="exampleInputPassword1" require>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ชื่อผู้ใช้</label>
                                    <input type="text" name="username" value="<?php echo $user_row["username"] ?>" class="form-control" id="exampleInputPassword1" require>
                                </div>
                                <!-- <div class="mb-3">
                                    <label class="form-label">รหัสผ่าน</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" require>
                                </div> -->
                            </div>
                            <div class="d-flex justify-content-between w-100">
                                <a class="btn btn-danger" href="./manage_users.php">ย้อนกลับ</a>
                                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>