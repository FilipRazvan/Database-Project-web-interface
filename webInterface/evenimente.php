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
                $order = 'id_eveniment';
            }

            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
            } else {
                $sort = 'DESC';
            }

            $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

            echo "
            <tr>
                <th><a href='?order=id_eveniment&sort=$sort'>id_eveniment</a></th>
                <th><a href='?order=titlu_eveniment&sort=$sort'>titlu_eveniment</a></th>
                <th><a href='?order=descriere_eveniment&sort=$sort'>descriere_eveniment</a></th>
                <th><a href='?order=data_incepere&sort=$sort'>data_incepere</a></th>
                <th><a href='?order=data_incheiere&sort=$sort'>data_incheiere</a></th>

                
                ";
            ?>

            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "Select * from `evenimente` order by $order $sort";
            $result = mysqli_query($con, $sql);
            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_eveniment'];
                    $titlu = $row['titlu_eveniment'];
                    $descriere = $row['descriere_eveniment'];
                    $inceput = $row['data_incepere'];
                    $incheiere = $row['data_incheiere'];

                    echo '<tr>
                    <th scope="row">' . $id . '</th>
                    <td>' . $titlu . '</td>
                    <td>' . $descriere . '</td>
                    <td>' . $inceput . '</td>
                    <td>' . $incheiere . '</td>
                   
                </tr>';
                }
            }


            ?>


        </tbody>
    </table>

</body>

</html>