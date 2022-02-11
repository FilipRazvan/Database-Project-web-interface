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
            <a href="meniu.php">INTOARCERE LA MENIU</a>
        </button>
    </div>
    <table class="table">
        <thead>

            <?php
            if (isset($_GET['order'])) {
                $order = $_GET['order'];
            } else {
                $order = 'id_produs';
            }

            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
            } else {
                $sort = 'DESC';
            }

            $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

            echo "
            <tr>
                <th><a href='?order=id_produs&sort=$sort'>id_produs</a></th>
                <th><a href='?order=id_utilizator&sort=$sort'>id_utilizator</a></th>
                <th><a href='?order=nume_produs&sort=$sort'>nume_produs</a></th>
                <th><a href='?order=descriere_produs&sort=$sort'>descriere_produs</a></th>
                <th><a href='?order=pret_produs&sort=$sort'>pret_produs</a></th>

                
                ";
            ?>

            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "Select * from `piata` order by $order $sort";
            $result = mysqli_query($con, $sql);
            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_produs'];
                    $utilizator = $row['id_utilizator'];
                    $nume = $row['nume_produs'];
                    $descriere = $row['descriere_produs'];
                    $pret = $row['pret_produs'];

                    echo '<tr>
                    <th scope="row">' . $id . '</th>
                    <td>' . $utilizator . '</td>
                    <td>' . $nume . '</td>
                    <td>' . $descriere . '</td>
                    <td>' . $pret . '</td>
                   
                </tr>';
                }
            }


            ?>


        </tbody>
    </table>

</body>

</html>