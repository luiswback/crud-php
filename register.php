<?php

require __DIR__ . '/vendor/autoload.php';

const TITLE = 'Cadastrar Vaga';

use \App\Entity\Vaga;

$objVaga = new Vaga();

//Validação post
if (isset($_POST['title'], $_POST['description'], $_POST['active'])) {

    $objVaga->title = $_POST['title'];
    $objVaga->description = $_POST['description'];
    $objVaga->active = $_POST['active'];
    $objVaga->register();

    header('location: index.php?status=success');
    exit;

}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form.php';
include __DIR__ . '/includes/footer.php';





