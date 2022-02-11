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
                $order = 'id_postare';
            }

            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
            } else {
                $sort = 'DESC';
            }

            $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

            echo "
            <tr>
                <th><a href='?order=id_postare&sort=$sort'>id_postare</a></th>
                <th><a href='?order=id_utilizator&sort=$sort'>id_utilizator</a></th>
                <th><a href='?order=continut_postare&sort=$sort'>continut_postare</a></th>
                <th><a href='?order=data_postare&sort=$sort'>data_postare</a></th>
                
                ";
            ?>

            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "Select * from `postari` order by $order $sort";
            $result = mysqli_query($con, $sql);
            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_postare'];
                    $id_utilizator = $row['id_utilizator'];
                    $postare = $row['continut_postare'];
                    $data = $row['data_postare'];

                    echo '<tr>
                    <th scope="row">' . $id . '</th>
                    <td>' . $id_utilizator . '</td>
                    <td>' . $postare . '</td>
                    <td>' . $data . '</td>

                    <td>

                </td>
                </tr>';
                }
            }


            ?>


        </tbody>
    </table>

</body>

</html>