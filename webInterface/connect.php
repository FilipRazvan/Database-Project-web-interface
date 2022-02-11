<?php

$con = new mysqli('localhost', 'root', '', 'retea de socializare');

if (!$con) {
    die(mysqli_error($con));
}
