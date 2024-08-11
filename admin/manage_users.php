<?php 
    include('sidebar.php');
    include('../connectdb.php');

    $sql = "SELECT * FROM users WHERE role_id = 1";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    $userCount = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการผู้ใช้</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">สมาชิก</li>
            </ol>
        </nav>
        <h1 class="h2">Dashboard</h1>
        <p>This is the homepage of a simple admin interface which is part of a tutorial written on Themesberg</p>
        <div class="row">
            <div class=""> <!-- col-12 col-xl-8 mb-4 mb-lg-0 -->
                <div class="card">
                    <h5 class="card-header">Latest transactions</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับที่</th>
                                        <th scope="col">ชื่อจริง</th>
                                        <th scope="col">นามสกุล</th>
                                        <th scope="col">อีเมล</th>
                                        <th scope="col">ชื่อผู้ใช้</th>
                                        <th scope="col">ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                            <tr>
                                                <td><?php echo $userCount++ ?></td>
                                                <td><?php echo $row["first_name"] ?></td>
                                                <td><?php echo $row["last_name"] ?></td>
                                                <td><?php echo $row["email"] ?></td>
                                                <td><?php echo $row["username"] ?></td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-danger" onclick="confirmDelete(<?php echo $row['id']; ?>)">ลบ</button>
                                                        <a class="btn btn-success" href="edit_user.php?userId=<?php echo $row['id']; ?>">แก้ไข</a>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php  }  ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-block btn-light">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "การลบนี้ไม่สามารถย้อนกลับได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยันการลบ',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the deleteUser.php with the userId parameter
                    window.location.href = './function/deleteUser.php?userId=' + userId;
                }
            })
        }
    </script>
</body>
</html>