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
            <a href="regiuni-add.php">Adauga REGIUNE</a>
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
                $order = 'id_regiune';
            }

            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
            } else {
                $sort = 'DESC';
            }

            $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

            echo "
            <tr>
                <th><a href='?order=id_regiune&sort=$sort'>id_regiune</a></th>
                <th><a href='?order=nume_regiune&sort=$sort'>nume_regiune</a></th>
                <th scope='col'>Modificare</th>
                ";
            ?>

            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "Select * from `regiuni` order by $order $sort";
            $result = mysqli_query($con, $sql);
            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_regiune'];
                    $nume = $row['nume_regiune'];


                    echo '<tr>
                    <th scope="row">' . $id . '</th>
                    <td>' . $nume . '</td>
                    <td> 
                    <button class="btn btn-primary"><a href="update-regiuni.php?updateid=' . $id . '"class="text-light">Update</a></button>
                    <button class="btn btn-danger"><a href="delete-regiuni.php?deleteid=' . $id . '"class="text-light">Delete</a></button>
                    </td>

                   
                </tr>';
                }
            }


            ?>


        </tbody>
    </table>

</body>

</html>