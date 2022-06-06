<?php

$showHeaderTable = true;


$message = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $message = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;

        case 'error':
            $message = '<div class="alert alert-danger">Ocorreu um erro ao realizar esta ação!</div>';
            break;
    }
}

$result = '';
/** @var $vagas */

foreach ($vagas as $vaga) {
    $result .= '<tr>
                <td>' . $vaga->id . '</td>
                <td>' . $vaga->title . '</td>
                <td>' . $vaga->description . '</td>
                <td>' . ($vaga->active == 'y' ? 'Ativa' : 'Inativo') . '</td>
                <td>' . date('d/m/Y à\s H:i:s', strtotime($vaga->date)) . '</td>
                <td>
                <a href="edit.php?id=' . $vaga->id . '"><button type="button" class="btn btn-primary">Editar</button>
                </a>  
                <a href="delete.php?id=' . $vaga->id . '"><button type="button" class="btn btn-danger">Excluir</button></a>   
                </td>
                </tr>';
}
$result = strlen($result) ? $result : $showHeaderTable = false;

$result = strlen($result) ? $result : '<tr>
<td colspan="6" class="text-center">Nenhuma vaga encontrada!</td>
</tr>'

?>

<main>

    <?= $message ?>
    <section>
        <a href="register.php">
            <button class="btn btn-success">Nova vaga</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?= $result ?>
            </tbody>
        </table>
    </section>
</main>