<?php
include 'connect.php';
if (isset($_POST['submit'])) {

    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $email = $_POST['email'];
    $parola = $_POST['parola'];
    $data_nasterii = $_POST['data_nasterii'];
    $gen = $_POST['gen'];
    $id_regiune = $_POST['id_regiune'];
    $adresa = $_POST['adresa'];


    $sql = "insert into `utilizator` (nume,prenume,email,parola,data_nasterii,gen,id_regiune,adresa) values('$nume','$prenume','$email','$parola','$data_nasterii','$gen','$id_regiune','$adresa') ";
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

<div class="utilizator">UTILIZATOR</div>


<body>
    <div class="container">
        <form method="post">

            <div class="form-group">
                <label>Nume</label>
                <input type="text" class="form-control" placeholder="nume" name="nume" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Prenume</label>
                <input type="text" class="form-control" placeholder="prenume" name="prenume" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="email" name="email" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Parola</label>
                <input type="password" class="form-control" placeholder="parola" name="parola" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Data nasterii</label>
                <input type="date" class="form-control" placeholder="data nasterii" name="data nasterii" autocomplete="off">
            </div>

            <div class="form-group">
                <label>gen</label>
                <input type="text" class="form-control" placeholder="gen (B (barbat) / F (femeie)" name="gen" autocomplete="off">
            </div>


            <div class="form-group">
                <label>id_regiune</label>
                <input type="number" class="form-control" placeholder="id_regiune" name="id_regiune" autocomplete="off">
            </div>

            <div class="form-group">
                <label>adresa</label>
                <input type="text" class="form-control" placeholder="adresa" name="adresa" autocomplete="off">
            </div>



            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <div class="container">
            <button class="btn btn-primay my-3">
                <a href="display.php">VIZUALIZARE DATE</a>
            </button>

            <button class="btn btn-primay my-10">
                <a href="meniu.php">INTOARCERE LA MENIU</a>
            </button>

        </div>
</body>

</html>