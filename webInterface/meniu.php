<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meniu</title>
    <style>
        <?php require 'meniu.css' ?>
    </style>
</head>

<div class="container">VIZUALIZARE MENIU</div>


<body>

    <div class="butoane">
        <button class="buton">
            <a class="buton2" href="display.php">UTILIZATOR</a>
        </button>

        <button class="buton">
            <a class="buton2" href="postari.php">POSTARI</a>
        </button>

        <button class="buton">
            <a class="buton2" href="pagini.php">PAGINI</a>
        </button>

        <button class="buton">
            <a class="buton2" href="aprecieripagina.php">APRECIERI PAGINA</a>
        </button>

        <button class="buton">
            <a class="buton2" href="mesajeprivate.php">MESAJE PRIVATE</a>
        </button>

        <button class="buton">
            <a class="buton2" href="regiuni.php">REGIUNI</a>
        </button>

        <button class="buton">
            <a class="buton2" href="participareeveniment.php">PARTICIPARE EVENIMENT</a>
        </button>

        <button class="buton">
            <a class="buton2" href="evenimente.php">EVENIMENTE</a>
        </button>

        <button class="buton">
            <a class="buton2" href="piata.php">PIATA</a>
        </button>

        <button class="buton">
            <a class="buton2" href="prieteni.php">PRIETENI</a>
        </button>
    </div>

    <!-- <div class="cerintaC">
        <button name="btn" type="btn"> Afisati numele regiunii si postarile tuturor utilizatorilor care sunt de gen masculin si sunt nascuti 2001.</button>
    </div> -->
    <form action='' method='POST' class="cerintaC">
        <div class="afistext">Afisati numele regiunii si postarile tuturor utilizatorilor care sunt de gen masculin si sunt nascuti 2001.</div>
        <input class="submitbutton" type='submit' name='submit' />
    </form>
    <div class="afisare">
        <?php
        if (isset($_POST['submit'])) {


            $sql = "select  u.nume, u.prenume, r.id_regiune , r.nume_regiune , p.id_postare , p.continut_postare , u.gen , u.data_nasterii
from utilizator u 
join regiuni r on (r.id_regiune = u.id_regiune) 
join postari p on (p.id_utilizator = u.id_utilizator) 
where u.gen = 'b' and year(u.data_nasterii) = 2001";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rowData = mysqli_fetch_array($result)) {
                    echo "Nume: ";
                    echo $rowData["nume"];
                    echo "&nbsp";
                    echo $rowData["prenume"] . '<br>';
                    echo "Id regiune: ";
                    echo $rowData["id_regiune"] . '<br>';
                    echo "Nume Regiune: ";
                    echo $rowData["nume_regiune"] . '<br>';
                    echo "Id Postare: ";
                    echo $rowData["id_postare"] . '<br>';
                    echo "Continut Postare: ";
                    echo $rowData["continut_postare"] . '<br>';
                    echo "Gen: ";
                    echo $rowData["gen"] . '<br>';
                    echo "Data Nasterii: ";
                    echo $rowData["data_nasterii"] . '<br>' . '<br>';
                }
            }
        }
        ?>
    </div>
    <form action='' method='POST' class="cerintaC">
        <div class="afistext">Pentru fiecare utilizator de gen masculin , afisati numarul de postari pe care le-a facut.</div>
        <input class="submitbutton2" type='submit' name='submit2' />
    </form>


    <div class="afisare">
        <?php

        if (isset($_POST['submit2'])) {


            $sql = "select u.nume, u.prenume,u.id_utilizator, u.gen, count(p.id_postare) as id_postare
            from utilizator u 
            join postari p on (p.id_utilizator = u.id_utilizator) 
            GROUP by u.id_utilizator 
            having u.gen = 'b'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rowData = mysqli_fetch_array($result)) {
                    echo "Nume: ";
                    echo $rowData["nume"];
                    echo "&nbsp";
                    echo $rowData["prenume"] . '<br>';
                    echo "Id utilizator: ";
                    echo $rowData["id_utilizator"] . '<br>';
                    echo "Gen: ";
                    echo $rowData["gen"] . '<br>';
                    echo "Cate Postari: ";
                    echo $rowData["id_postare"] . '<br>' . '<br>';
                }
            }
        }
        ?>

        <button class="butonviz">
            <a class="butonvizualizare" href="vizualizari.php">---> Catre Vizualizari </a>
        </button>
    </div>
</body>

</html>