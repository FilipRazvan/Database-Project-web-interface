<?php
include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retea de socializare</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" </head>


<body>

    <div class="container">
        <button class="btn btn-primay my-5">
            <a href="utilizator.php">Adauga utilizator</a>
        </button>
        <button class="btn btn-primay my-5">
            <a href="meniu.php">INTOARCERE LA MENIU</a>
        </button>
    </div>
    <table class="table">
        <thead>
            <?php
            if (isset($_GET['order'])) {
                $order = $_GET['order'];
            } else {
                $order = 'id_utilizator';
            }

            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
            } else {
                $sort = 'DESC';
            }

            $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

            echo "
            <tr>
                <th><a href='?order=id_utilizator&sort=$sort'>id_utilizator</a></th>
                <th><a href='?order=Nume&sort=$sort'>Nume</a></th>
                <th><a href='?order=Prenume&sort=$sort'>Prenume</a></th>
                <th><a href='?order=email&sort=$sort'>email</a></th>
                <th><a href='?order=parola&sort=$sort'>parola</a></th>
                <th><a href='?order=data nasterii&sort=$sort'>data nasterii</a></th>
                <th><a href='?order=gen&sort=$sort'>gen</a></th>
                <th><a href='?order=id_regiune&sort=$sort'>id_regiune</a></th>
                <th><a href='?order=adresa&sort=$sort'>adresa</a></th>
                <th scope='col'>Modificare</th>
                
                ";
            ?>

            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "Select * from `utilizator` order by $order $sort";
            $result = mysqli_query($con, $sql);
            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_utilizator'];
                    $nume = $row['nume'];
                    $prenume = $row['prenume'];
                    $email = $row['email'];
                    $parola = $row['parola'];
                    $data_nasterii = $row['data_nasterii'];
                    $gen = $row['gen'];
                    $id_regiune = $row['id_regiune'];
                    $adresa = $row['adresa'];
                    echo '<tr>
                    <th scope="row">' . $id . '</th>
                    <td>' . $nume . '</td>
                    <td>' . $prenume . '</td>
                    <td>' . $email . '</td>
                    <td>' . $parola . '</td>
                    <td>' . $data_nasterii . '</td>
                    <td>' . $gen . '</td>
                    <td>' . $id_regiune . '</td>
                    <td>' . $adresa . '</td>
                    <td>
                    <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '"class="text-light">Update</a></button>
                    <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '"class="text-light">Delete</a></button>
                </td>
                </tr>';
                }
            }

            ?>

        </tbody>
    </table>

</body>

</html>