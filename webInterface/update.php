<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "select * from `utilizator` where id_utilizator = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$nume = $row['nume'];
$prenume = $row['prenume'];
$email = $row['email'];
$parola = $row['parola'];
$data_nasterii = $row['data_nasterii'];
$gen = $row['gen'];
$id_regiune = $row['id_regiune'];
$adresa = $row['adresa'];

if (isset($_POST['submit'])) {

    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $email = $_POST['email'];
    $parola = $_POST['parola'];
    $data_nasterii = $_POST['data_nasterii'];
    $gen = $_POST['gen'];
    $id_regiune = $_POST['id_regiune'];
    $adresa = $_POST['adresa'];


    $sql = "update `utilizator` set id_utilizator=$id, nume='$nume',prenume='$prenume',email='$email',parola='$parola',data_nasterii='$data_nasterii',gen='$gen',id_regiune='$id_regiune',adresa='$adresa' where id_utilizator=$id";
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
                <label>Nume</label>
                <input type="text" class="form-control" placeholder="nume" name="nume" autocomplete="off" value=<?php echo "$nume"; ?>>
            </div>

            <div class="form-group">
                <label>Prenume</label>
                <input type="text" class="form-control" placeholder="prenume" name="prenume" autocomplete="off" value=<?php echo "$prenume"; ?>>

            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="email" name="email" autocomplete="off" value=<?php echo "$email"; ?>>
            </div>

            <div class="form-group">
                <label>Parola</label>
                <input type="password" class="form-control" placeholder="parola" name="parola" autocomplete="off" value=<?php echo "$parola"; ?>>
            </div>

            <div class="form-group">
                <label>Data nasterii</label>
                <input type="date" class="form-control" placeholder="data nasterii" name="data nasterii" autocomplete="off" value=<?php echo "$data_nasterii"; ?>>
            </div>

            <div class="form-group">
                <label>gen</label>
                <input type="text" class="form-control" placeholder="gen (B (barbat) / F (femeie)" name="gen" autocomplete="off" value=<?php echo "$gen"; ?>>
            </div>


            <div class="form-group">
                <label>id_regiune</label>
                <input type="number" class="form-control" placeholder="id_regiune" name="id_regiune" autocomplete="off" value=<?php echo "$id_regiune"; ?>>
            </div>

            <div class="form-group">
                <label>adresa</label>
                <input type="text" class="form-control" placeholder="adresa" name="adresa" autocomplete="off" value=<?php echo "'$adresa'"; ?>>
            </div>



            <button type="submit" class="btn btn-primary" name="submit">UPDATE</button>
        </form>
        <div class="container">
            <button class="btn btn-primay my-3">
                <a href="display.php">Vizualizare date</a>
            </button>
        </div>
</body>

</html>