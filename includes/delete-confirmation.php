<?php
/** @var $objVaga */
?>
<main>



    <h2 class="mt-3">Excluir Vaga</h2>

    <form method="post">
        <div class="form-group">
            <p>Você realmente deseja excluir a vaga <strong><?=$objVaga->title?></strong>?</p>
        </div>

        <div class="form-group">
            <button type="submit" name="delete" class="btn btn-danger">Excluir</button>
            <a href="index.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>

        </div>
    </form>

</main>