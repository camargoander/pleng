<div class="grid-4">
    <form method="POST" name="editarmaterial" action="../../../../server/src/dadosprecadastrados/cadastrarMaterialEtapa.php">
        <h3> <?php echo $row['nomeetapa']; ?> </h3>

        <input type="hidden" value="<?php echo $row['idetapa']; ?>" name="idetapa">

        <div class="field">
            <label> Material: </label>
            <select name="material">
                <?php include('../../../../server/src/listas/listaMaterial.php'); ?>
            </select>
        </div>

        <div class="items">
            <div class="item">
                <div class="field">
                    <label> Materiais cadastrados: </label>
                    <input type="text" value="<?php echo $row['nomeMat']; ?>" disabled>
                </div>
            </div>
            <div class="item">    
                <button type="button" class="btnVermelho" onclick="deletarDados(<?php echo $row['idmatetapa']; ?>, 'idmatetapa', 'material_etapa', 'materialetapa');"> X </button>
            </div>
        </div>
        

        <div class="grid-12">
            <button type="submit" class="btnVerde"> Adicionar </button>
        </div>
    </form>
</div>