<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "Select * from `regiuni` where id_regiune = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$id = $row['id_regiune'];
$nume = $row['nume_regiune'];


if (isset($_POST['submit'])) {

    $id = $row['id_regiune'];
    $nume = $row['nume_regiune'];


    $sql = "update `regiuni` set id_regiune=$id, nume_regiune='$nume_regiune'";
    echo "$sql";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Updated successfully";
    } else {
        die(mysqli_error($con));
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" <title>Retea de socializare</title>
</head>

<div class="utilizator">UTILIZATOR</div>


<body>
    <div class="container">
        <form method="post">

            <div class="form-group">
                <label>id_regiune</label>
                <input type="number" class="form-control" placeholder="id_regiune" name="id_regiune" autocomplete="off" value=<?php echo "$id"; ?>>
            </div>

            <div class="form-group">
                <label>nume_regiune</label>
                <input type="text" class="form-control" placeholder="nume_regiune" name="nume_regiune" autocomplete="off" value=<?php echo "$nume"; ?>>

            </div>




            <button type="submit" class="btn btn-primary" name="submit">UPDATE</button>
        </form>
        <div class="container">
            <button class="btn btn-primay my-3">
                <a href="regiuni.php">Vizualizare date</a>
            </button>
        </div>
</body>

</html>