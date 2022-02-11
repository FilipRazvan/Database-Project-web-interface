<?php
include 'connect.php';
if (isset($_POST['submit'])) {

    $id_regiune = $_POST['id_regiune'];
    $nume_regiune = $_POST['nume_regiune'];



    $sql = "insert into `regiuni` (id_regiune , nume_regiune) values ('$id_regiune','$nume_regiune') ";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Data inserted successfully";
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

<div class="regiuni">REGIUNI</div>


<body>
    <div class="container">
        <form method="post">

            <div class="form-group">
                <label>id_regiune</label>
                <input type="number" class="form-control" placeholder="id_regiune" name="id_regiune" autocomplete="off">
            </div>

            <div class="form-group">
                <label>nume_regiune</label>
                <input type="text" class="form-control" placeholder="nume_regiune" name="nume_regiune" autocomplete="off">
            </div>




            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <div class="container">
            <button class="btn btn-primay my-3">
                <a href="regiuni.php">VIZUALIZARE DATE</a>
            </button>

            <button class="btn btn-primay my-10">
                <a href="meniu.php">INTOARCERE LA MENIU</a>
            </button>

        </div>
</body>

</html>