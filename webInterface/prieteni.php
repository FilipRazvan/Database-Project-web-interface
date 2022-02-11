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
                $order = 'id_utilizator1';
            }

            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
            } else {
                $sort = 'DESC';
            }

            $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

            echo "
            <tr>
                <th><a href='?order=id_utilizator1&sort=$sort'>id_utilizator1</a></th>
                <th><a href='?order=id_utilizator2&sort=$sort'>id_utilizator2</a></th>
                <th><a href='?order=raspuns&sort=$sort'>raspuns</a></th>
               
                ";
            ?>


            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "Select * from `prieteni` order by $order $sort";
            $result = mysqli_query($con, $sql);
            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $id1 = $row['id_utilizator1'];
                    $id2 = $row['id_utilizator2'];
                    $raspuns = $row['raspuns'];


                    echo '<tr>
                    <th scope="row">' . $id1 . '</th>
                    <th scope="row">' . $id2 . '</th>
                    <td>' . $raspuns . '</td>

                   
                </tr>';
                }
            }


            ?>


        </tbody>
    </table>

</body>

</html>