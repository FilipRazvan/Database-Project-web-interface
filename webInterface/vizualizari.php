<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php require 'vizualizari.css' ?>
    </style>
</head>
<button class="btn">
    <a href="meniu.php">MENIU</a>
</button>

<body>
    <div class="compusa">
        <span> COD VIZUALIZARE COMPUSA </span>
    </div>

    <Div class="pre">
        <pre class="pre"> create or replace view view_compus as
        select u.id_utilizator,u.prenume,p.id_produs,p.nume_produs , r.id_regiune, r.nume_regiune
        from utilizator u join piata p using (id_utilizator)
        join regiuni r using (id_regiune)
        where p.pret_produs > 20;
    -----------------------------------------------------
    -----------------------------------------------------
    -----------------------------------------------------

 update view_compus
 set nume_produs = "Test view update"
 where id_regiune = 1; </pre>
    </Div>


    <form action='' method='POST' class="cerinta">
        <div class="afistext">Afisare vizualizare compusa dupa UPDATE </div>
        <input class="submit" type='submit' name='submit' />
    </form>
    <div class="afisare">
        <?php
        if (isset($_POST['submit'])) {


            $sql = "select * from view_compus";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rowData = mysqli_fetch_array($result)) {
                    echo "Id utilizator: ";
                    echo $rowData["id_utilizator"] . '<br>';
                    echo "Prenume: ";
                    echo $rowData["prenume"] . '<br>';
                    echo "Id Produs: ";
                    echo $rowData["id_produs"] . '<br>';
                    echo "Nume Produs: ";
                    echo $rowData["nume_produs"] . '<br>';
                    echo "Id regiune: ";
                    echo $rowData["id_regiune"] . '<br>';
                    echo "Nume Regiune: ";
                    echo $rowData["nume_regiune"] . '<br>';
                    echo "--------------" . '<br>' . '<br>';
                }
            }
        }
        ?>
    </div>
    <pre>

    </pre>
    <div class="complexa">
        <span> COD VIZUALIZARE COMPLEXA </span>
    </div>

    <Div>
        <pre class="pre">
 create or replace view view_complex as
        select u.id_utilizator , u.nume , u.prenume , m.continut_mesaj , count(m.id_mesaj) as mesaje , r.nume_regiune
        from utilizator u 
        join mesaje_private m on u.id_utilizator = m.id_emitator
        join regiuni r using (id_regiune)
        GROUP by id_utilizator;
        </pre>
    </Div>


    <form action='' method='POST' class="cerinta">
        <div class="afistext">Afisare vizualizare complexa </div>
        <input class="submit" type='submit' name='submit2' />
    </form>
    <div class="afisare">
        <?php
        if (isset($_POST['submit2'])) {


            $sql = "select * from view_complex";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rowData = mysqli_fetch_array($result)) {
                    echo "Id utilizator: ";
                    echo $rowData["id_utilizator"] . '<br>';
                    echo "Nume: ";
                    echo $rowData["nume"];
                    echo "&nbsp";
                    echo $rowData["prenume"] . '<br>';
                    echo "Continut mesaj: ";
                    echo $rowData["continut_mesaj"] . '<br>';
                    echo "Mesaje in total: ";
                    echo $rowData["mesaje"] . '<br>';
                    echo "Nume Regiune: ";
                    echo $rowData["nume_regiune"] . '<br>';
                    echo "--------------" . '<br>' . '<br>';
                }
            }
        }
        ?>
    </div>


</body>

</html>