<form method="POST" name="etapadiariodeobra" action="../../../../server/src/diariodeobra/editarEtapa.php" class="formEtapa">
    <div class="etapa">
        <label>
            <h2> Nome da etapa </h2>
            <input type="checkbox" />
            
            <div class="collapse" id="col3Content">

                    
                <div class="items">
                    <div class="item">
                        <div class="field">
                            <label> Etapa: </label>
                            <select id="etapa" name="etapa" onchange="selecionaEtapa()">
                            <option> Selecione uma etapa..</option>
                                <?php include('../../../../server/src/listas/listaEtapaDiario.php'); ?>
                            </select>
                        </div>
                    </div>
                    <div class="item">
                        <div class="field">
                            <label> Material: </label>
                            <select id="material" name="material" onchange="selecionaQtdeMaterial()">
                            </select>
                        </div>
                    </div>
                </div>

                <div class="items">
                    <div class="item">
                        <div class="field">
                            <label> Quantidade de material usado até agora: </label>
                            <input type="text" name="qtdematatual" value="<?php echo $row['qtde_atual']; ?>"/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="field">
                            <div class="field">
                                <label> Quantidade de material a ser usado até a finalização: </label>
                                <input type="text" name="qtdemattotal" id="qtdemattotal" readonly />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="items">
                    <div class="item">
                        <div class="field">
                            <label> Tamanho concluido: </label>
                            <input type="text" name="tamanhoatual" value="<?php echo $row['tamanho_atual']; ?>" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="field">
                            <div class="field">
                                <label> Tamanho total: </label>
                                <input type="text" name="tamanhototal" id="tamanhototal" readonly />
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" value="editar" name="Editar">

                <div class="grid-12">
                    <button type="button" class="btnVermelho" onclick="excluirEtapa(<?php echo $row['idetapadiario'] ?>);"> Excluir </button>
                    <div class="botoes">
                        <button type="submit" class="btnVerde"> Salvar </button>
                    </div>
                </div>
            </div>
        </label>
    </div>
</form>