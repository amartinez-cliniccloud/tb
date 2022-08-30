<?php
require_once "Model/Dni.php";

$validDni = new \App\Dni\Model\Dni('00000000T');

printf('%s is a valid DNI', (string) $validDni);

$invalidDni = new \App\Dni\Model\Dni('00000000G');
