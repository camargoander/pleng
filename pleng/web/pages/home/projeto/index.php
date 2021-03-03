<div class="grid-4 projeto">
    <form method="POST" name="projeto" action="../../../server/src/SelecionaProjeto.php">
        <h3> <?php echo $row['nome']; ?> </h3>
        <img src="" />
        <div class="field">
            <label> Cidade: <b><?php echo $row['cidade']; ?> </b> </label>
        </div>
        <div class="field">
            <label> Endereço: <b> <?php echo $row['endereco']; ?> </b> </label>
        </div>

        <input type="hidden" value="<? echo $row['idprojeto']?>" name="id" />

        <div class="grid-12">
            <button type="submit" class="grid-6 btnEditar"> Editar </button>
            <button type="submit" class="grid-6 btnSelecionar"> Selecionar </button>
        </div>
    </form>
</div>