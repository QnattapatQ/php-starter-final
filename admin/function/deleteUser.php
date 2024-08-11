<?php
    include("../../connectdb.php");

    $userId = $_GET["userId"];

    $sql = "DELETE FROM users WHERE id = $userId";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../manage_users.php");
        exit(0);
    } else {
        header("Location: ../manage_users.php");
        exit(0);
    }
?>