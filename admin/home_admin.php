<?php 
    include('sidebar.php');
    include('../connectdb.php');

    $sql = "SELECT * FROM users WHERE role_id = 1"; // แสดงจำนวน
    $result = mysqli_query($conn, $sql);

    $row = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="./css/home_admin.css">
</head>
<body>
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">ภาพรวม</li>
            </ol>
        </nav>
        <h1 class="h2">Dashboard</h1>
        <p>This is the homepage of a simple admin interface which is part of a tutorial written on Themesberg</p>
        <div class="row my-4">
            <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="card">
                    <h5 class="card-header text-center">ผู้ใช้ที่ทำการสมัครสมาชิก</h5>
                    <div class="card-body">
                        <h5 class="card-title text-center"><?=$row ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                <div class="card">
                    <h5 class="card-header">Revenue</h5>
                    <div class="card-body">
                        <h5 class="card-title">$2.4k</h5>
                        <p class="card-text">Feb 1 - Apr 1, United States</p>
                        <p class="card-text text-success">4.6% increase since last month</p>
                    </div>
                    </div>
            </div>
            <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                <div class="card">
                    <h5 class="card-header">Purchases</h5>
                    <div class="card-body">
                        <h5 class="card-title">43</h5>
                        <p class="card-text">Feb 1 - Apr 1, United States</p>
                        <p class="card-text text-danger">2.6% decrease since last month</p>
                    </div>
                    </div>
            </div>
            <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                <div class="card">
                    <h5 class="card-header">Traffic</h5>
                    <div class="card-body">
                        <h5 class="card-title">64k</h5>
                        <p class="card-text">Feb 1 - Apr 1, United States</p>
                        <p class="card-text text-success">2.5% increase since last month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-lg-0">
                <div class="card">
                    <h5 class="card-header">Latest transactions</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Order</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Date</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">17371705</th>
                                    <td>Volt Premium Bootstrap 5 Dashboard</td>
                                    <td>johndoe@gmail.com</td>
                                    <td>€61.11</td>
                                    <td>Aug 31 2020</td>
                                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">17370540</th>
                                    <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                    <td>jacob.monroe@company.com</td>
                                    <td>$153.11</td>
                                    <td>Aug 28 2020</td>
                                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">17371705</th>
                                    <td>Volt Premium Bootstrap 5 Dashboard</td>
                                    <td>johndoe@gmail.com</td>
                                    <td>€61.11</td>
                                    <td>Aug 31 2020</td>
                                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">17370540</th>
                                    <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                    <td>jacob.monroe@company.com</td>
                                    <td>$153.11</td>
                                    <td>Aug 28 2020</td>
                                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">17371705</th>
                                    <td>Volt Premium Bootstrap 5 Dashboard</td>
                                    <td>johndoe@gmail.com</td>
                                    <td>€61.11</td>
                                    <td>Aug 31 2020</td>
                                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">17370540</th>
                                    <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                    <td>jacob.monroe@company.com</td>
                                    <td>$153.11</td>
                                    <td>Aug 28 2020</td>
                                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>
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