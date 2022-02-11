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
                $order = 'id_pagina';
            }

            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
            } else {
                $sort = 'DESC';
            }

            $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

            echo "
            <tr>
                <th><a href='?order=id_pagina&sort=$sort'>id_pagina</a></th>
                <th><a href='?order=nume_pagina&sort=$sort'>nume_pagina</a></th>
                <th><a href='?order=descriere_pagina&sort=$sort'>descriere_pagina</a></th>

                
                ";
            ?>


            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "Select * from `pagini` order by $order $sort";
            $result = mysqli_query($con, $sql);
            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_pagina'];
                    $nume = $row['nume_pagina'];
                    $descriere = $row['descriere_pagina'];


                    echo '<tr>
                    <th scope="row">' . $id . '</th>
                    <td>' . $nume . '</td>
                    <td>' . $descriere . '</td>
                   
                </tr>';
                }
            }


            ?>


        </tbody>
    </table>

</body>

</html>