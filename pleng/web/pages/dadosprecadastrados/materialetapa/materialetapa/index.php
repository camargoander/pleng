<div class="grid-4">
    <form method="POST" name="editarmaterial" action="../../../../server/src/dadosprecadastrados/cadastrarMaterialEtapa.php">
        <h3> <?php echo $row['nome']; ?> </h3>

        <input type="hidden" value="<?php echo $row['idetapa']; ?>" name="idetapa">

        <div class="field">
            <label> Material: </label>
            <select name="material">
                <?php include('../../../../server/src/listas/listaMaterial.php'); ?>
            </select>
        </div>

        <?php include('../../../../server/src/daosprecadastrados/listarMaterialEtapaCad.php'); ?>
        
        <div class="grid-12">
            <button type="submit" class="btnVerde"> Adicionar </button>
        </div>
    </form>
</div>