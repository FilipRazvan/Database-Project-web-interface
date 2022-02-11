<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "delete from `regiuni` where id_regiune=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location:regiuni.php');
    } else {
        die(mysqli_error($con));
    }
}
