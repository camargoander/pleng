<div class="grid-4">
    <form method="POST" name="editaretapa" action="../../../../server/src/dadosprecadastrados/editarEtapa.php">
        <h3> <?php echo $row['nome']; ?> </h3>

        <div class="field">
            <label> Nome: </label>
            <input type="text" name="nome" <?php echo $row['nome']; ?> />
        </div>

        <div class="field">
            <label> Duração: </label>
            <input type="text" name="duracao" <?php echo $row['duracao']; ?> />
        </div>

        <input type="hidden" value="<?php echo $row['idetapa']; ?>" name="idetapa"/>

        <div class="grid-12">
            <button type="submit" class="btnVerde"> Editar </button>
            <button type="button" class="btnVermelho"> Deletar </button>
        </div>
    </form>
</div>