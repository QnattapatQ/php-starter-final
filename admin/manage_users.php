<?php 
    include('sidebar.php');
    include('../connectdb.php');

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

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
            <div class="col-12 col-xl-8 mb-4 mb-lg-0">
                <div class="card">
                    <h5 class="card-header">Latest transactions</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ลำดับที่</th>
                                    <th scope="col">ชื่อจริง</th>
                                    <th scope="col">นามสกุล</th>
                                    <th scope="col">อีเมล</th>
                                    <th scope="col">ชื่อผู้ใช้</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        for($i = 0; $i < $count; $i++){
                                            $row = mysqli_fetch_object($result);
                                            echo "<tr>";
                                            echo "<td>".$count."</td>";
                                            echo "<td>".$row->first_name."</td>";
                                            echo "<td>".$row->last_name."</td>";
                                            echo "<td>".$row->email."</td>";
                                            echo "<td>".$row->username."</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                                </table>
                        </div>
                        <a href="#" class="btn btn-block btn-light">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>