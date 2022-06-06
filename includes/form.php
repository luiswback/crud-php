<?php
/** @var $objVaga */
?>
<main>
    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">
        <div class="form-group">
            <label>Titulo</label>
            <input type="text" class="form-control" name="title" value="<?=$objVaga->title?>">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" name="description" rows="5"><?=$objVaga->description?></textarea>
        </div>

        <div class="form-group">
            <label>Status</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="active" value="y" checked>Ativa
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="active" value="n" <?=$objVaga->active == 'n' ? 'checked' : '' ?>>Inativa
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
            <a href="index.php">
                <button class="btn btn-success">Voltar</button>
            </a>
        </div>



    </form>

</main>