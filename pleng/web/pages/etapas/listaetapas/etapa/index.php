<div class="grid-4">
    <form method="POST" name="etapa" action="../../../../server/src/etapas/selecionarEtapa.php">
        <h3> <?php echo $row['nome']; ?> </h3>

        <p><b>Situação: </b> <?php echo $row['situacao']; ?> </p>

        <input type="hidden" name="id" value="<?php $row['idetapaproj']?>">
        
        <button type="submit" class="btnVerde"> Editar </button>
    </form>
    
    <form method="POST" name="etapa" action="../../../../server/src/etapas/deletarEtapa.php">
        <input type="hidden" name="id" value="<?php $row['idetapaproj']?>">
        <button type="submit" class="btnVermelho"> Deletar </button>
    </form>
</div>