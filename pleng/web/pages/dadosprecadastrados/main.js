function deletarDados(id, idcolumn, tabela, pagina) {
    var infos =  {
        'id': id,
        'idcolumn': idcolumn,
        'tabela': tabela,
        'pagina': pagina
        
    };

    var dados = JSON.stringify(infos);

    $.ajax({
        url: '../../../../server/src/dadosprecdastrados/deletar.php',
        type: 'POST',
        data: {data: dados},
        success: function(response){
            // Retorno se tudo ocorreu normalmente
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
        // Retorno caso algum erro ocorra
        }
    });
}