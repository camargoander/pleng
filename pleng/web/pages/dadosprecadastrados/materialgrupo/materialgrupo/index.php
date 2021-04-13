<div class="grid-6">
    <form method="POST" name="editarmaterial" action="../../../../server/src/dadosprecadastrados/cadastrarMaterialGrupo.php">
        <h3> <?php echo $row['nomeetapa']; ?> </h3>

        <input type="hidden" value="<?php echo $row['idetapa']; ?>" name="idetapa">

        <div class="field">
            <label> Grupo: </label>
            <select name="grupo">
                
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
                <div class="field">
                    <label> Qtde: </label>
                    <input type="text" value="<?php echo $row['qtde']; ?>" name="qtde">
                </div>
            </div>
            <div class="item">    
                <button type="button" class="btnVermelho" onclick="deletarDados(<?php echo $row['idmatgrupo']; ?>, 'idmatgrupo', 'material_grupo', 'materialgrupo');"> X </button>
            </div>
        </div>
        

        <div class="grid-12">
            <button type="submit" class="btnVerde"> Adicionar </button>
        </div>
    </form>
</div>