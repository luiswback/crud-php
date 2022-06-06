<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;

const TITLE = 'Editar vaga';
//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}
//consulta a vaga
$objVaga = Vaga::getVaga($_GET['id']);

//Validação da vaga;
if (!$objVaga instanceof Vaga){
    header('location: index.php?status=error');
    exit;
}

//Validação post
if (isset($_POST['title'], $_POST['description'], $_POST['active'])) {

    $objVaga->title = $_POST['title'];
    $objVaga->description = $_POST['description'];
    $objVaga->active = $_POST['active'];
    $objVaga->update();

    header('location: index.php?status=success');
    exit;
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form.php';
include __DIR__ . '/includes/footer.php';





